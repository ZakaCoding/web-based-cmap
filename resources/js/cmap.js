import * as go from 'gojs';

function init() {
  // set key
  const key = generateRandomString(3) + '-' + generateRandomString(3) + '-CMAP';
  document.querySelector('#cmap-key').innerHTML = key;

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
        "clickCreatingTool.archetypeNodeData": { text: "new node" },

        // enable undo & redo
        "undoManager.isEnabled": true,
        positionComputation: (diagram, pt) => {
          return new go.Point(Math.floor(pt.x), Math.floor(pt.y));
        }
      });

  // define each Node's appearance
  myDiagram.nodeTemplate =
    $(go.Node, "Auto",  // the whole node panel
      { 
        locationSpot: go.Spot.Center,
        isShadowed: true, shadowBlur: 1,
        shadowOffset: new go.Point(0, 1),
        shadowColor: "rgba(0, 0, 0, .14)"
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
            editable: true  // enable in-place editing
          },
          new go.Binding("text").makeTwoWay()
        )
    );
  
  myDiagram.nodeTemplateMap.add("Start",
      $(go.Node, "Auto", 
        // { desiredSize: new go.Size(75, 75) },
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
        toShortLength: 3
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
            editable: true,  // enable in-place editing
          },
          // editing the text automatically updates the model data
          new go.Binding("text").makeTwoWay())
      )
    );

  /**
   * Create node or link when user input data form input field
   */

  // when user input new node from input
  var inputForm_super = document.querySelector('#super_concept')
  inputForm_super.addEventListener('keydown', (event) => {
    // get value from super_concept input form
    let data = inputForm_super.value

    // check enter key
    if(event.key === 'Enter')
    {      
      // create a new node without a link
      let newNodeData = { category : "Start", text : data}
      myDiagram.model.addNodeData(newNodeData)

      // show log
      // console.log('Clicked data: ' + data)

      // clear input form
      inputForm_super.value = ''
    }
  });

  var inputForm_concept = document.querySelector('#concept')
    inputForm_concept.addEventListener('keydown', (event) => {
      // get input value of concept
      let conceptData = inputForm_concept.value

      // check enter key or tab
      if(event.key === 'Enter')
      {
        // create a new node
        let newNodeData = { text : conceptData};
        myDiagram.model.addNodeData(newNodeData)

        // clear input form
        inputForm_concept.value = ''
      }
  });

  /**
   * Save cmap to database
   */

  // user data
  const user = JSON.parse(document.querySelector('#user').getAttribute("data-user"));  
  
  document.querySelector('#save').addEventListener('click', (event) => {
    var userid = user.id
    var modelData = JSON.parse(myDiagram.model.toJson())
    modelData.userID = userid
    modelData.key = document.querySelector('#cmap-key').innerHTML

    // show log
    // console.log(modelData)

    // check cmap model
    if(myDiagram.model.nodeDataArray.length === 0 || myDiagram.model.linkDataArray.length === 0)
    {
      alert('Concept Map Model cannot be empty at least have 2 node and connected with link.')
      return 0
    }

    // save data to database using laravel API
    save(modelData)
    myDiagram.isModified = false;
  });

  document.querySelector('#update').addEventListener('click', (event) => {
    var userid = user.id
    var modelData = JSON.parse(myDiagram.model.toJson())
    modelData.userID = userid
    modelData.key = document.querySelector('#cmap-key').innerHTML

    // show log
    // console.log(modelData)

    // check cmap model
    if(myDiagram.model.nodeDataArray.length === 0 || myDiagram.model.linkDataArray.length === 0)
    {
      alert('Concept Map Model cannot be empty at least have 2 node and connected with link.')
      return 0
    }

    // save data to database using laravel API
    save(modelData)
    myDiagram.isModified = false;
  });

  /**
   * Create assignment process
   */
  const formAssignment = document.querySelector('#assignment');
  const assignBtn = document.querySelector('#assignment-button');
  assignBtn.addEventListener('click', (event) => {

    // input validation check
    if(formAssignment.checkValidity())
    {

      // check cmap model
      if(myDiagram.model.nodeDataArray.length === 0)
      {
        alert('Concept Map Model cannot be empty, you must create concept map first then create assignment')
        return 0
      }

      var modelData = JSON.parse(myDiagram.model.toJson())
      modelData.userID = user.id
      modelData.key = document.querySelector('#cmap-key').innerHTML

      // save
      save(modelData)

      // required data for assignment
      const focusQuestion = document.querySelector('#title').value
      const dueDate = document.querySelector('#due-date').value
      const timer = document.querySelector('#timer').value
      const focusMethod = document.querySelectorAll('input[name="method"]')
      var method = ""

      // get method value
      for(let i = 0; i < focusMethod.length; i++)
      {
        if(focusMethod[i].checked)
        {
          method = focusMethod[i].value;
          break;
        }
      }
      
      /** 
       * Bind data to json so Laravel API can Read
       */

      modelData.data = {
        "focusquestion" : focusQuestion,
        "duedate" : dueDate,
        "timer" : timer,
        "method" : method
      }

      // show log
      // console.log(modelData)

      // create assignment
      createAssignment(modelData)
      
    } else {
      formAssignment.reportValidity();
    }
  });


  /**
   * Load Model and view from project
   */
  if(sessionStorage.getItem('model') !== null)
  {
    let modelData = sessionStorage.getItem('model')
    myDiagram.model = go.Model.fromJson(modelData)

    // from session
    document.querySelector('#cmap-key').innerHTML = JSON.parse(modelData).key;
  }

  // get key from url if exists
  const queryString = window.location.search;
  const urlParams = new URLSearchParams(queryString);
  var keyUrl = urlParams.get('key')

  // check url
  if(keyUrl !== null)
  {
    load(keyUrl)
  }

  // Load function
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

          // change default cmap key blade
          const mapKey = document.querySelector('#cmap-key')
          mapKey.innerHTML = response.data.key

          // change button 
          const saveBtn = document.querySelector('#save')
          const updateBtn = document.querySelector('#update')

          saveBtn.classList.toggle('hidden');
          updateBtn.classList.toggle('hidden');

          // show log
          if(response.data.assignmentStatus !== null)
          {
            // hidden button create assignment
            const createAssignmentBtn = document.querySelector('#create-assignment')
            const updateAssignmentBtn = document.querySelector('#update-assignment')
            
            createAssignmentBtn.classList.toggle('hidden')
            updateAssignmentBtn.classList.toggle('hidden')
          }
      })
      .catch(error => {
          // console.error(error)

          return alert('Cannot load Concept Map model, make sure URL keycode is valid')
      });
  }

  /**
   * Example load node and link
   */
  // create the model for the concept map
  // var nodeDataArray = [
  //   { key: 1, text: "Concept Maps" },
  //   { key: 2, text: "Organized Knowledge" },
  //   { key: 3, text: "Context Dependent" },
  //   { key: 4, text: "Concepts" },
  //   { key: 5, text: "Propositions" },
  //   { key: 6, text: "Associated Feelings or Affect" },
  //   { key: 7, text: "Perceived Regularities" },
  //   { key: 8, text: "Labeled" },
  //   { key: 9, text: "Hierarchically Structured" },
  //   { key: 10, text: "Effective Teaching" },
  //   { key: 11, text: "Crosslinks" },
  //   { key: 12, text: "Effective Learning" },
  //   { key: 13, text: "Events (Happenings)" },
  //   { key: 14, text: "Objects (Things)" },
  //   { key: 15, text: "Symbols" },
  //   { key: 16, text: "Words" },
  //   { key: 17, text: "Creativity" },
  //   { key: 18, text: "Interrelationships" },
  //   { key: 19, text: "Infants" },
  //   { key: 20, text: "Different Map Segments" }
  // ];
  // var linkDataArray = [
  //   { from: 1, to: 2, text: "represent" },
  //   { from: 2, to: 3, text: "is" },
  //   { from: 2, to: 4, text: "is" },
  //   { from: 2, to: 5, text: "is" },
  //   { from: 2, to: 6, text: "includes" },
  //   { from: 2, to: 10, text: "necessary\nfor" },
  //   { from: 2, to: 12, text: "necessary\nfor" },
  //   { from: 4, to: 5, text: "combine\nto form" },
  //   { from: 4, to: 6, text: "include" },
  //   { from: 4, to: 7, text: "are" },
  //   { from: 4, to: 8, text: "are" },
  //   { from: 4, to: 9, text: "are" },
  //   { from: 5, to: 9, text: "are" },
  //   { from: 5, to: 11, text: "may be" },
  //   { from: 7, to: 13, text: "in" },
  //   { from: 7, to: 14, text: "in" },
  //   { from: 7, to: 19, text: "begin\nwith" },
  //   { from: 8, to: 15, text: "with" },
  //   { from: 8, to: 16, text: "with" },
  //   { from: 9, to: 17, text: "aids" },
  //   { from: 11, to: 18, text: "show" },
  //   { from: 12, to: 19, text: "begins\nwith" },
  //   { from: 17, to: 18, text: "needed\nto see" },
  //   { from: 18, to: 20, text: "between" }
  // ];
  // // Show node and link to canvas
  // myDiagram.model = new go.GraphLinksModel(nodeDataArray, linkDataArray);
}

// clicking the button inserts a new node to the right of the selected node,
// and adds a link to that new node
function addNodeAndLink(e, obj) {
  var adornment = obj.part;
  var diagram = e.diagram;
  diagram.startTransaction("Add State");

  // get the node data for which the user clicked the button
  var fromNode = adornment.adornedPart;
  var fromData = fromNode.data;
  // create a new "State" data object, positioned off to the right of the adorned Node
  var toData = { text: "new" };
  var p = fromNode.location.copy();
  p.x += 200;
  toData.loc = go.Point.stringify(p);  // the "loc" property is a string, not a Point object
  // add the new node data to the model
  var model = diagram.model;
  model.addNodeData(toData);

  // create a link data from the old node data to the new node data
  var linkdata = {
    from: model.getKeyForNodeData(fromData),  // or just: fromData.id
    to: model.getKeyForNodeData(toData),
    text: "transition"
  };
  // and add the link data to the model
  model.addLinkData(linkdata);

  // select the new Node
  var newnode = diagram.findNodeForData(toData);
  diagram.select(newnode);

  diagram.commitTransaction("Add State");

  // if the new node is off-screen, scroll the diagram to show the new node
  diagram.scrollToRect(newnode.actualBounds);
}

function save(jsonData)
{
  fetch('/api/submit-cmap', {
      method : 'POST',
      headers : {
      'Content-Type' : 'application/json'
      },
      body : JSON.stringify(jsonData)
  })
  .then(response => response.json())
  .then(data => {
      // Handle response from laravel api
      console.log(data)

      // save to session browser
      sessionStorage.setItem('model', JSON.stringify(jsonData))

      // show toast
      const toast = document.querySelector('#toast-success')
      // Add animation
      toast.classList.toggle('hidden')
      toast.classList.add('animate__fadeInUp')
  })
  .catch(error => {
      console.error(error)
  });
}

function createAssignment(jsonData)
{
  fetch('/api/create-assignment', {
    method : 'POST',
    headers : {
    'Content-Type' : 'application/json'
    },
    body : JSON.stringify(jsonData)
  })
  .then(response => response.json())
  .then(data => {
      // Handle response from laravel api
      // console.log('success with :' + JSON.stringify(data))

      const assignmentEl = document.querySelector('#assignment')

      // create some animation on button
      const defaultState = document.querySelector('#default-state')
      const processingState = document.querySelector('#processing-state')

      processingState.classList.toggle('hidden')
      defaultState.classList.toggle('hidden')

      setTimeout((event) => {
        // add cmap key to success state
        document.querySelector('#key').innerHTML = data['data']

        // change state to success
        assignmentEl.classList.toggle('hidden');

        // show success state
        const successState = document.querySelector('#success-state')
        successState.classList.toggle('hidden')

        // hidden create button
        const createBtn = document.querySelector('#create-assignment')
        const updateBtn = document.querySelector('#update-assignment')

        createBtn.classList.toggle('hidden')
        updateBtn.classList.toggle('hidden')

        // show log
        console.log(data)
      }, 2000);
  })
  .catch(error => {
      console.error(error)
  });
}

function generateRandomString(length) {
  var result = '';
  var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';
  for (var i = 0; i < length; i++) {
    result += characters.charAt(Math.floor(Math.random() * characters.length));
  }
  return result;
}

// Load Cmap
window.addEventListener('DOMContentLoaded',init);