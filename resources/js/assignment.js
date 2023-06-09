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
        }
        });

    // define each Node's appearance
    myDiagram.nodeTemplate =
    $(go.Node, "Auto",  // the whole node panel
        { 
            locationSpot: go.Spot.Center,
            isShadowed: true, shadowBlur: 1,
            shadowOffset: new go.Point(0, 1),
            shadowColor: "rgba(0, 0, 0, .14)",
            deletable: false
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
            cursor: "pointer",       
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
                    cursor: "pointer",
                }),
            $(go.TextBlock,
                {
                    font: "bold 16pt helvetica, bold arial, sans-serif",
                    stroke: "whitesmoke",
                    editable: false
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
        new go.Binding('stroke', 'progress', progress => progress ? "#52ce60" /* green */ : 'black'),
        new go.Binding('strokeWidth', 'progress', progress => progress ? 2.5 : 1.5)),
        $(go.Shape,  // the arrowhead
        { toArrow: "standard", stroke: null },
        new go.Binding('fill', 'progress', progress => progress ? "#52ce60" /* green */ : 'black')),
        $(go.Panel, "Auto",
        $(go.Shape,  // the label background, which becomes transparent around the edges
            {
            fill: $(go.Brush, "Radial",
                { 0: "rgb(245, 245, 245)", 0.7: "rgb(245, 245, 245)", 1: "rgba(245, 245, 245, 0)" }),
            stroke: null
            }),
        $(go.TextBlock, "Link",  // the label text
            {
                textAlign: "center",
                font: "9pt helvetica, arial, sans-serif",
                margin: 4,
                editable: true  // enable in-place editing
            },
            // editing the text automatically updates the model data
            new go.Binding("text").makeTwoWay())
        )
    );

    /**
     * Create assignment process
     */
    // const formAssignment = document.querySelector('#assignment');
    // const assignBtn = document.querySelector('#assignment-button');
    // assignBtn.addEventListener('click', (event) => {

    //     // input validation check
    //     if(formAssignment.checkValidity())
    //     {

    //         // check cmap model
    //         if(myDiagram.model.nodeDataArray.length === 0)
    //         {
    //         alert('Concept Map Model cannot be empty, you must create concept map first then create assignment')
    //         return 0
    //         }

    //         var modelData = JSON.parse(myDiagram.model.toJson())
    //         modelData.userID = user.id
    //         modelData.key = key

    //         // save
    //         save(modelData)

    //         // required data for assignment
    //         const focusQuestion = document.querySelector('#title').value
    //         const dueDate = document.querySelector('#due-date').value
    //         const timer = document.querySelector('#timer').value
    //         const focusMethod = document.querySelectorAll('input[name="method"]')
    //         var method = ""

    //         // get method value
    //         for(let i = 0; i < focusMethod.length; i++)
    //         {
    //         if(focusMethod[i].checked)
    //         {
    //             method = focusMethod[i].value;
    //             break;
    //         }
    //         }

    //         /** 
    //          * Bind data to json so Laravel API can Read
    //          */

    //         modelData.data = {
    //         "focusquestion" : focusQuestion,
    //         "duedate" : dueDate,
    //         "timer" : timer,
    //         "method" : method
    //         }

    //         // show log
    //         // console.log(modelData)

    //         // create assignment
    //         createAssignment(modelData)

    //     } else {
    //         formAssignment.reportValidity();
    //     }
    // });

    /**
     * Load CMAP from key to take assignment
     */

    // get key from url if exists
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    var keyUrl = urlParams.get('key')
    var inputKey = document.querySelector('#ckey');

    if(keyUrl !== null)
    {
        
        inputKey.value = keyUrl

        load(inputKey.value)
    }

    inputKey.addEventListener('keydown', (event) => {
        if(event.key === 'Enter')
        {
            load(inputKey.value)
        }
    });
    
    // Load function
    function load(key)
    {
        // call laravel API to load data model
        let url = '/api/load-assignment/' + key
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
            const assignment = response.data.assignment

            // make some magic
            let assignmentTitleEl = document.querySelector('#assignment-title')
            assignmentTitleEl.classList.toggle('hidden')
            assignmentTitleEl.innerHTML = 'Focus Question : ' + assignment.focus_question

            let timerEl = document.querySelector('#timer')
            timerEl.classList.toggle('hidden')
            timerEl.innerHTML = 'Timer : <span class="text-green-600">' + assignment.timer + ' Minutes</span>'

            // load model to canvas
            myDiagram.model = new go.GraphLinksModel(model.nodeDataArray)
        })
        .catch(error => {
            // console.error(error)

            return alert('Cannot load Concept Map model, make sure keycode is valid and assignment not overdue')
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


window.addEventListener('DOMContentLoaded', init);