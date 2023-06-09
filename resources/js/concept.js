import * as go from 'gojs';

function init() {
  // Since 2.2 you can also author concise templates with method chaining instead of GraphObject.make
  // For details, see https://gojs.net/latest/intro/buildingObjects.html
  const $ = go.GraphObject.make;  // for conciseness in defining templates

  // some constants that will be reused within templates
  let roundedRectangleParams = {
    parameter1: 2,  // set the rounded corner
    spot1: go.Spot.TopLeft, spot2: go.Spot.BottomRight  // make content go all the way to inside edges of rounded corners
  };

  let myDiagram =
    $(go.Diagram, "canvas",  // must name or refer to the DIV HTML element
      {
        initialAutoScale: go.Diagram.Uniform,  // an initial automatic zoom-to-fit
        // contentAlignment: go.Spot.Center,  // align document to the center of the viewport
        layout:
          $(go.ForceDirectedLayout,  // automatically spread nodes apart
            { 
              maxIterations: 100, 
              defaultSpringLength: 50, 
              defaultElectricalCharge: 100,
            }
          ),
        
        // have mouse wheel events zoom in and out instead of scroll up and down
        "toolManager.mouseWheelBehavior": go.ToolManager.WheelZoom,

        // support double-click in background creating a new node
        // "clickCreatingTool.archetypeNodeData": { text: "new node" },

        // enable undo & redo
        "undoManager.isEnabled": true,
        positionComputation: (diagram, pt) => {
          return new go.Point(Math.floor(pt.x), Math.floor(pt.y));
        },
      });

  // Enable linking tool
  myDiagram.toolManager.linkingTool.isEnabled = false;

  // define each Node's appearance
  myDiagram.nodeTemplate =
    $(go.Node, "Auto",  // the whole node panel
      { 
        locationSpot: go.Spot.Center,
        isShadowed: true, shadowBlur: 1,
        shadowOffset: new go.Point(0, 1),
        shadowColor: "rgba(0, 0, 0, .14)",
        deletable: false,
      },
      new go.Binding("location", "loc", go.Point.parse).makeTwoWay(go.Point.stringify),
      // define the node's outer shape, which will surround the TextBlock
      $(go.Shape, "RoundedRectangle",
        {
          name : 'SHAPE',
          fill: '#ffffff',
          stroke: null,
          portId: "",  // this Shape is the Node's port, not the whole Node
          fromLinkable: true, fromLinkableSelfNode: true, fromLinkableDuplicates: true,
          toLinkable: true, toLinkableSelfNode: true, toLinkableDuplicates: true,
          cursor: "pointer"
        }
      ),
      $(go.TextBlock,
          { 
            font: "bold 12pt helvetica, bold arial, sans-serif",
            stroke: "rgba(0, 0, 0, .87)",
            margin: 4,
            editable: false  // enable in-place editing
          },
          new go.Binding("text").makeTwoWay()
        )
    );
  
  myDiagram.nodeTemplateMap.add("Start",
      $(go.Node, "Auto", 
        { 
          // desiredSize: new go.Size(75, 75),
          deletable: false,
        },
        new go.Binding("location", "loc", go.Point.parse).makeTwoWay(go.Point.stringify),
        $(go.Shape, "RoundedRectangle",
          {
            fill:"#00B628", /** Green */
            stroke: null,
            portId: "",
            fromLinkable: true, fromLinkableSelfNode: true, fromLinkableDuplicates: true,
            toLinkable: true, toLinkableSelfNode: true, toLinkableDuplicates: true,
            cursor: "pointer"
          }),
        $(go.TextBlock,
          {
            font: "bold 16pt helvetica, bold arial, sans-serif",
            stroke: "whitesmoke"
          },

          /** 
           * this text included when user define super concept
           * text value get from input
           * 
           * Need this json format
           * { Category: "start", text : "Example text from input"}
          */ 
          new go.Binding("text").makeTwoWay()
        )
      )
    );

  // replace the default Link template in the linkTemplateMap
  myDiagram.linkTemplate =
    $(go.Link,  // the whole link panel
      {
        curve: go.Link.Bezier,
        adjusting: go.Link.Stretch,
        reshapable: true, relinkableFrom: true, relinkableTo: true,
        toShortLength: 3,
        deletable: false,
      },
      new go.Binding("points").makeTwoWay(),
      new go.Binding("curviness"),
      $(go.Shape,  // the link shape
        { strokeWidth: 1.5 },
        new go.Binding('stroke', 'progress', progress => progress ? "#52ce60" /* green */ : '#00349A'),
        new go.Binding('strokeWidth', 'progress', progress => progress ? 2.5 : 1.5),
        ),
      $(go.Shape,  // the arrowhead
        { toArrow: "standard", stroke: null },
        new go.Binding('fill', 'progress', progress => progress ? "#52ce60" /* green */ : '#00349A')),
      $(go.Panel, "Auto",
        $(go.Shape,  // the label background, which becomes transparent around the edges
          {
            fill: $(go.Brush, "Radial",
                    { 0: "rgb(245, 245, 245)", 0.7: "rgb(245, 245, 245)", 1: "rgba(245, 245, 245, 0)" }
                  ),
            stroke: null
          }),
        $(go.TextBlock, "Link",  // the label text
          {
            textAlign: "center",
            font: "9pt helvetica, arial, sans-serif",
            margin: 4,
            editable: false,  // enable in-place editing
          },
          // editing the text automatically updates the model data
          new go.Binding("text").makeTwoWay())
      )
    );

  /**
   * Load Model and view from project
   */

  // get key from url if exists
  const pathName = window.location.pathname;
  const key = pathName.split('/').pop();

  // check url
  if(key !== '')
  {
    load(key.toString())

    const reverse = document.querySelector('#reverse-btn')
    reverse.addEventListener('click', () => {
      // change icon play to stop
      const playIcon = document.querySelector('#play-icon')
      const stopIcon = document.querySelector('#stop-icon')

      playIcon.classList.toggle('hidden')
      stopIcon.classList.toggle('hidden')

      // replay node and link
      replayActions(key.toString())
    });
  }

  // Load concept map data
  function load(key)
  {
    // call laravel API to load data model
    let url = '/api/load-cmap/' + key
      fetch(url, {
          method : 'GET',
          headers : {
              'Content-Type' : 'application/json'
          },
      })
      .then(response => response.json())
      .then(response => {
          // Handle response from laravel api
          const model = response.data.model

          // load model to canvas
          myDiagram.model = new go.GraphLinksModel(model.nodeDataArray, model.linkDataArray)
      })
      .catch(error => {
          // console.error(error)

          return alert('Cannot load Concept Map model, make sure URL keycode is valid')
      });
  }

  /**
   * record the time when a user creates a node or link in a GoJS diagram
   */

  // Function to replay the log
  // function to replay user actions
  function replayActions(key) {
    // remove all nodes and links from the diagram
    myDiagram.nodes.each(function(node) {
      myDiagram.model.removeNodeData(node.data);
    });
    myDiagram.links.each(function(link) {
      myDiagram.model.removeLinkData(link.data);
    });

    // re-init
    myDiagram = go.Diagram.fromDiv("canvas")

    // call laravel API to load data model
    let url = '/api/load-cmap/' + key
      fetch(url, {
          method : 'GET',
          headers : {
              'Content-Type' : 'application/json'
          },
      })
      .then(response => response.json())
      .then(response => {
          // // Handle response from laravel api
          const model = response.data.model

          // button icon on reverse cmap
          const playIcon = document.querySelector('#play-icon')
          const stopIcon = document.querySelector('#stop-icon')

          const reverseBtn = document.querySelector('#reverse-btn');
          reverseBtn.setAttribute('disabled', true)
          
          let i = 0;
          let x = 0;
          let loadNode = setInterval(() => {
            // load node to canvas
            var nodeData = model.nodeDataArray[i];

            // Add a new node data to the model
            myDiagram.model.addNodeData(nodeData)
            
            i++;

            if(i === model.nodeDataArray.length) {

              console.log("Expected");
              clearInterval(loadNode);

              // Wait for layout to complete before adding links
              let loadLink = setInterval(() => {
                // load link to canvas
                myDiagram.model.addLinkData(model.linkDataArray[x]);

                x++;

                if(x === model.linkDataArray.length) {
                  console.log("Expected 2");
    
                  clearInterval(loadLink);

                  // change icon to play again
                  playIcon.classList.toggle('hidden')
                  stopIcon.classList.toggle('hidden')

                  reverseBtn.removeAttribute('disabled')
                }
              }, 1000);
            }

            // Get the corresponding node from the diagram
            var node = myDiagram.findNodeForData(nodeData);
            var getPosition = nodeData.loc.split(" ");
            // Create and configure the animation for node
            var nodeAnimation = new go.Animation();
            nodeAnimation.add(node, "position", node.position, new go.Point(parseInt(getPosition[0]), parseInt(getPosition[1])));
            nodeAnimation.duration = 800;

            // Start the animation
            nodeAnimation.start();
          }, 800);

      })
      .catch(error => {
          console.error(error)

          // return alert('Cannot load Concept Map model, make sure URL keycode is valid')
      });
  }
}

// Load Cmap
window.addEventListener('DOMContentLoaded',init);