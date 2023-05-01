// Set the worker source URL
pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.9.359/pdf.worker.min.js';

// Set up PDF.js viewer options
const viewerOptions = {
    enableWebGL: true, // Enables hardware acceleration using WebGL, which is required for text selection
    textLayerMode: 1, // Enables text selection
    ignoreErrors: true, // Ignores non-critical errors to prevent the viewer from crashing
  };
  
  // Load PDF document and set up viewer
  const pdfUrl = './assets/sample.pdf';
  const container = document.querySelector('#pdf-container');
  // const ctx = canvas.getContext('2d');

  let pdfDoc = null;
  let pages = [];
  
  pdfjsLib.getDocument(pdfUrl).promise.then((doc) => {
    pdfDoc = doc;
    const numPages = pdfDoc.numPages;
  
    // Create page view for each page
    for (let i = 1; i <= numPages; i++) {
      const page = pdfDoc.getPage(i);
  
      // Create page view
      const pageView = new pdfjsViewer.PDFPageView({
        container: container,
        id: i,
        scale: 1.5,
        defaultViewport: page.getViewport({ scale: 1.5 }),
        textLayerFactory: new pdfjsViewer.DefaultTextLayerFactory(),
        annotationLayerFactory: new pdfjsViewer.DefaultAnnotationLayerFactory(),
        viewer: viewerOptions,
      });
  
      pages.push(pageView);
  
      // Render page view
      pageView.setPdfPage(page);
      pageView.draw();
    }
  
    // Set up PDF viewer
    const pdfViewer = new pdfjsViewer.PDFViewer({
      container: container,
      viewerPrefs: viewerOptions,
    });
    pdfViewer.setDocument(pdfDoc);
    pdfViewer.setPages(pages);
  
    // Scroll to first page
    pdfViewer.scrollPageIntoView({ pageNumber: 1 });
  }).catch((err) => {
    console.error('Error loading PDF document:', err);
  });
  
  // Export text selection to JSON
  function exportTextSelectionToJson() {
    const selections = [];
  
    // Loop through each page view and extract text selections
    for (let i = 0; i < pages.length; i++) {
      const pageView = pages[i];
      const textLayer = pageView.textLayer;
  
      if (!textLayer) continue;
  
      const textSelections = textLayer.getTextSelection();
  
      for (let j = 0; j < textSelections.length; j++) {
        const selection = textSelections[j];
        const text = selection.textContent;
        const rect = selection.rect;
  
        // Convert rectangle coordinates to PDF coordinates
        const viewport = pageView.viewport;
        const pdfRect = viewport.convertToPdfPoint(rect.left, rect.top);
        pdfRect.push(viewport.convertToPdfPoint(rect.right, rect.bottom));
  
        // Add selection data to array
        selections.push({
          page: i + 1,
          text: text,
          rect: pdfRect,
        });
      }
    }
  
    // Export selections as JSON
    const json = JSON.stringify(selections, null, 2);
    console.log(json);
  }
  
  // Export text selection to array
  function exportTextSelectionToArray() {
    const selections = [];
  
    // Loop through each page view and extract text selections
    for (let i = 0; i < pages.length; i++) {
      const pageView = pages[i];
      const textLayer = pageView.textLayer;
  
      if (!textLayer) continue;
  
      const textSelections = textLayer.getTextSelection();
  
      for (let j = 0; j < textSelections.length; j++) {
        let selection = textSelections

        selection = textSelections[j];
        const text = selection.textContent;
        const rect = selection.rect;
  
        // Convert rectangle coordinates to PDF coordinates
        const viewport = pageView.viewport;
        const pdfRect = viewport.convertToPdfPoint(rect.left, rect.top);
        pdfRect.push(viewport.convertToPdfPoint(rect.right, rect.bottom));
  
        // Add selection data to array
        selections.push({
          page: i + 1,
          text: text,
          rect: pdfRect,
        });
      }
    }
  
    // Export selections as array
    console.log(selections);
  }
  
  // Add event listeners for exporting text selection
  const exportJsonButton = document.getElementById('export-json-button');
  exportJsonButton.addEventListener('click', exportTextSelectionToJson);
  const exportArrayButton = document.getElementById('export-array-button');
  exportArrayButton.addEventListener('click', exportTextSelectionToArray);
  


// pdfjsLib.getDocument(url).promise.then((pdf) => {
//     const numPages = pdf.numPages;
//     const promises = [];
  
//     for (let i = 1; i <= numPages; i++) {
//       // Get the i-th page of the PDF document
//       promises.push(pdf.getPage(i).then((page) => {
//         const viewport = page.getViewport({scale: 1});
//         canvas.width = viewport.width;
//         canvas.height = viewport.height;
  
//         // Render the i-th page on the canvas
//         return page.render({
//           canvasContext: ctx,
//           viewport: viewport
//         }).promise;
//       }));
//     }
  
//     // Wait for all pages to be rendered
//     return Promise.all(promises);
//   }).then(() => {
//     // Enable text selection on the canvas
//     const textLayerDiv = document.createElement('div');
//     textLayerDiv.style.position = 'absolute';
//     textLayerDiv.style.left = 0;
//     textLayerDiv.style.top = 0;
//     textLayerDiv.style.width = canvas.width + 'px';
//     textLayerDiv.style.height = canvas.height + 'px';
//     document.body.appendChild(textLayerDiv);
  
//     // Loop over all pages and render text layer for each page
//     for (let i = 1; i <= pdf.numPages; i++) {
//       pdf.getPage(i).then((page) => {
//         const viewport = page.getViewport({scale: 1.5});
//         const textContent = page.getTextContent();
  
//         const textLayerDiv = document.createElement('div');
//         textLayerDiv.style.position = 'absolute';
//         textLayerDiv.style.left = 0;
//         textLayerDiv.style.top = 0;
//         textLayerDiv.style.width = canvas.width + 'px';
//         textLayerDiv.style.height = canvas.height + 'px';
//         document.body.appendChild(textLayerDiv);
  
//         pdfjsLib.renderTextLayer({
//           textContent: textContent,
//           container: textLayerDiv,
//           viewport: viewport,
//           textDivs: []
//         });
//       });
//     }
  
//     // Export selected text to JSON or an array
//     const selectionData = [];
//     const textSelection = window.getSelection();
//     const textNodes = textLayerDiv.querySelectorAll('.textLayer > div');
  
//     for (let i = 0; i < textNodes.length; i++) {
//       const node = textNodes[i];
//       const selectionRange = document.createRange();
//       selectionRange.selectNodeContents(node);
//       const rangeRects = selectionRange.getClientRects();
//       for (let j = 0; j < rangeRects.length; j++) {
//         const rangeRect = rangeRects[j];
//         const textRect = node.getBoundingClientRect();
//         const text = node.textContent.substring(j, j + 1);
//         if (textSelection.containsNode(node, true)) {
//           selectionData.push({
//             text: text,
//             x: rangeRect.left - textRect.left,
//             y: rangeRect.top - textRect.top,
//             width: rangeRect.width,
//             height: rangeRect.height
//           });
//         }
//       }
//     }
  
//     console.log(selectionData);
//     // Export selected text to JSON
//     console.log(JSON.stringify(selectionData));
//   }).catch((err) => {
//     console.error('Error: ' + err);
//   });



