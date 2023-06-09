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
    $(go.Diagram, "board",  // must name or refer to the DIV HTML element
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
   * Example load node and link
   */

  // from json
  var mapModel = { "class": "GraphLinksModel",
    "nodeDataArray": [
      {"key":1,"text":"Concept Maps","category":"Start","loc":"141.59616369760678 299.3567030054118"},
      {"key":2,"text":"Organized Knowledge","loc":"267.8264676396873 190.72437380658823"},
      {"key":3,"text":"Context Dependent","loc":"461.99328478930147 324.9472150449955"},
      {"key":4,"text":"Concepts","loc":"152.77462108720388 73.62803497246539"},
      {"key":5,"text":"Propositions","loc":"-13.055830222464223 98.89393853933183"},
      {"key":7,"text":"Perceived Regularities","loc":"269.42818249012987 -84.93174524973973"},
      {"key":8,"text":"Labeled","loc":"-11.936091210484726 242.00382133590733"},
      {"key":9,"text":"Hierarchically Structured","loc":"-48.196037986735746 -27.47830601873808"},
      {"key":10,"text":"Effective Teaching","loc":"532.4266413087132 200.08100960907714"},
      {"key":11,"text":"Crosslinks","loc":"-228.88351977743667 97.53089381272332"},
      {"key":12,"text":"Effective Learning","loc":"423.9496995265681 72.06700216207489"},
      {"key":13,"text":"Events (Happenings)","loc":"527.6039647632205 -157.73001886240797"},
      {"key":14,"text":"Objects (Things)","loc":"232.4559913551051 -210.3160773029606"},
      {"key":15,"text":"Symbols","loc":"-176.9359201000255 250.7593488512197"},
      {"key":16,"text":"Words","loc":"6.2312646717349125 368.07795081145997"},
      {"key":17,"text":"Creativity","loc":"-274.00213273458564 -96.1581487685628"},
      {"key":18,"text":"Interrelationships","loc":"-423.3381509487693 15.153316826399157"},
      {"key":20,"text":"Different Map Segments","loc":"-678.7047380086574 61.89849301277497"}
    ],
    "linkDataArray": [
      {"from":1,"to":2,"text":"represent","points":[218.60949491842604,299.3575586392439,221.55288825290447,261.4431571555712,234.5047115567448,230.34818102371113,254.70821724630855,206.53386278330998]},
      {"from":2,"to":3,"text":"is","points":[302.2068571578586,206.3560263902135,352.7260768026558,228.85468327906105,401.5658143318984,262.96971504673036,446.4052706826983,309.16679473785564]},
      {"from":2,"to":4,"text":"is","points":[248.12158090229713,174.98765006596122,225.17785408750285,156.93754277106117,196.16793424412091,129.1084591345335,165.5285752588037,89.4419367793679]},
      {"from":2,"to":5,"text":"is","points":[179.1604632774402,176.41496434992783,134.07741310057668,168.7984008805821,76.25736706813476,148.58094951692232,14.89537369204173,114.56314153728448]},
      {"from":2,"to":10,"text":"necessary\nfor","points":[358.67691950043826,179.40334965171613,385.80146281054726,175.57577781735634,412.6341543881469,176.159687266428,458.1261585333994,185.53215305436308]},
      {"from":2,"to":12,"text":"necessary\nfor","points":[278.22738419108197,174.88169518712,305.17223599129153,135.74121028943594,341.0195117932352,106.56621070309666,385.92582649439333,87.68164257161135]},
      {"from":4,"to":5,"text":"combine\nto form","points":[124.3487041193331,89.29407519746628,104.51283554554313,100.49970347981053,78.57229042864486,106.20316376416679,43.09478685505593,103.15227968435913]},
      {"from":4,"to":7,"text":"are","points":[159.7704493863996,57.74575346939406,182.1329928366421,5.736138033178795,213.22302549812832,-36.61973641125562,251.02607465826895,-69.18192326605096]},
      {"from":4,"to":8,"text":"are","points":[142.44692789014306,89.47160660123319,105.22899403798343,145.88720514377974,61.66534249328272,190.61897827153672,10.57826823145426,226.29298705579782]},
      {"from":4,"to":9,"text":"are","points":[111.57063434191565,59.29264259373931,52.395866995807616,39.395047250672526,5.21179146166088,14.21342136040347,-28.198373099641103,-11.744430007066917]},
      {"from":5,"to":9,"text":"are","points":[-19.789445589295134,83.00888538302017,-32.967272589590856,51.337484656753404,-40.77673689589487,20.73806140496844,-45.92554904707062,-11.55860994753315]},
      {"from":5,"to":11,"text":"may be","points":[-68.89159991112582,110.03309566607881,-106.67479988585312,116.78254673724052,-143.95616859931826,116.51785663077442,-181.05993238704227,108.7351271751044]},
      {"from":7,"to":13,"text":"in","points":[295.90138506012886,-100.61125140075657,335.399056055338,-124.4802323600143,384.25038745187953,-141.05815026551738,440.7796963805152,-147.31105388772986]},
      {"from":7,"to":14,"text":"in","points":[259.2411856859143,-100.77703052789217,238.72291802599275,-133.13862025766468,230.25782994216627,-165.31846120124675,231.6636479369655,-194.3919901100799]},
      {"from":8,"to":15,"text":"with","points":[-48.21689140781001,254.97375739977574,-77.20282704097951,263.72729521084665,-106.5744494992343,265.1042488280979,-136.34169781158565,259.3982218052256]},
      {"from":8,"to":16,"text":"with","points":[-3.3004952830561436,257.8676766384845,11.874503647825168,288.7116346968507,15.990171390301395,320.18437667849645,9.605810608789866,352.164121795861]},
      {"from":9,"to":17,"text":"aids","points":[-150.6033644341043,-37.829470333435154,-168.2414521239725,-40.054187433947455,-206.3119847536569,-53.56086844636596,-249.34255497093065,-80.4649975906659]},
      {"from":11,"to":18,"text":"show","points":[-249.26536442547402,81.80070119469268,-273.0902203455368,62.52155537091141,-312.19598137814575,43.09589697298782,-362.5701848262461,30.70196353662752]},
      {"from":17,"to":18,"text":"needed\nto see","points":[-285.0847528569358,-80.32381059301052,-311.22591647725955,-43.42028144647583,-344.5696513124059,-16.91199901678293,-384.69002017224113,-0.4586617719193349]},
      {"from":18,"to":20,"text":"between","points":[-453.10915607028784,30.810761103291195,-486.7246234040115,47.9143748262959,-529.5589875048089,58.77509859137825,-579.8730774857597,60.17821489220269]}
    ]
  }

  myDiagram.model = go.Model.fromJson(mapModel);
}

// Load Cmap
window.addEventListener('DOMContentLoaded',init);