<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Table Example</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"
    />
  </head>

  <body>
    <table>
      <thead>
        <tr>
          <th>&nbsp;</th>
          <?php foreach($columns as $column): ?>
          <th>
            <?php echo $column; ?>
          </th>
          <?php endforeach; ?>
        </tr>
      </thead>
      <tbody>
        <?php foreach($rows as $row): ?>
        <tr>
          <th>
            <?php echo $row[ 'title']; ?>
          </th>
          <?php foreach($columns as $column): ?>
          <td>
            <?php echo $row[$column]; ?>
          </td>
          <?php endforeach; ?>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </body>

</html>
