<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <script src="7. loeng ladu js.js"></script>
    <style>
      #lisa-vorm-vaade {
        display: none;
        border: 1px solid red;
        padding: 10px;
      }
      h1 {
        font-family: sans-serif;
        font-size: 20px;
        color: blue;
      }
      .paremale {
        float: right;
      }
    </style>

    <title>Ladu test</title>
  </head>
  <body>
    <h1>LADU</h1>
    <p><button type="button" id="kuva-lisa-vorm">LISA KIRJE</button></p>
    <div id="lisa-vorm-vaade">
      <div class="paremale">
        <button type="button" id="peida-lisa-vorm">PEIDA</button>
      </div>
      <h2>Lisa kirje</h2>

      <form id="lisa-vorm">
        <table>
          <tr>
            <td>Nimetus</td>
            <td>
              <input type="text" id="nimetus">
            </td>
          </tr>
          <tr>
            <td>Kogus</td>
            <td>
              <input type="number" id="kogus">
            </td>
          </tr>
        </table>
        <button type="submit" id="lisa-nupp">Lisa kirje</button>
      </form>
    </div>

    <table id="kirjed" border="1px">
      <thead>
        <tr>
          <th>Nimetus</th>
          <th>Kogus</th>
          <th>Tegevused</th>
        <tr>
      </thead>
      <tbody></tbody>
    </table>


  <script src="5. loeng js test.js"></script>
  </body>
</html>
