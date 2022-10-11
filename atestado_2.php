<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>

<script type="text/javascript">
  bkLib.onDomLoaded(function() {
    nicEditors.allTextAreas()
  }); // convert all text areas to rich text editor on that page

  bkLib.onDomLoaded(function() {
    new nicEditor().panelInstance('area1');
  }); // convert text area with id area1 to rich text editor.

  bkLib.onDomLoaded(function() {
    new nicEditor({
      fullPanel: true
    }).panelInstance('area2');
  }); // convert text area with id area2 to rich text editor with full panel.
</script>

<html>

<head>
  <title>How to Create textarea into a rich content/text editor using jQuery</title>
  <script type="text/javascript" src="nicEdit-latest.js"></script>
  <script type="text/javascript">
    //<![CDATA[
    bkLib.onDomLoaded(function() {
      new nicEditor({
        maxHeight: 200
      }).panelInstance('area');
    });
    //]]>
  </script>
</head>

<body>
  <h4>How to Create textarea into a rich content/text editor using jQuery</h4>
  <div id="sample">
    <h4>Simple textarea</h4>
    <textarea name="area" id="area" style="width:70%;height:200px;">
       Some Initial Content was in this textarea
  </textarea>
  </div>
</body>

</html>