<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <link  href="https://unpkg.com/grapesjs/dist/css/grapes.min.css" rel="stylesheet"/>
      <script src="https://unpkg.com/grapesjs"></script>
      <script src="https://cdn.jsdelivr.net/npm/grapesjs-preset-webpage@0.1.11/dist/grapesjs-preset-webpage.min.js"></script>
      <script src="https://unpkg.com/grapesjs-echarts"></script>
    <style>
      body,
      html {
        height: 100%;
        margin: 0;
      }
    </style>
  </head>
  <body>
    <br>
    <textarea id="html"></textarea>
    <textarea id="css"></textarea>
    <button id="save">Save</button>
    <div id="gjs" style="height:0px; overflow:hidden">
        
    </div>
    <script>
    const editor = grapesjs.init({
            height: '100%',
            container: '#gjs',
            showOffsets: true,
            fromElement: true,
            noticeOnUnload: false,
            storageManager: false,
            plugins: ['grapesjs-preset-webpage'],
          });
    const htmlTextarea = document.getElementById('html')
    const cssTextarea = document.getElementById('css')
    const updateTextarea = (component, editor)=>{
      const e = component.em.get("Editor");
      htmlTextarea.value= e.getHtml();
      cssTextarea.value= e.getCss();
    }
    editor.on('component:add', updateTextarea);
    editor.on('component:update', updateTextarea);
    editor.on('component:remove', updateTextarea);
    const updateInstance = () => {
      editor.setComponents(htmlTextarea.value)
      editor.setStyle(cssTextarea.value)
    }
    document.getElementById('save').onclick=updateInstance;
    </script>
  </body>
</html>
