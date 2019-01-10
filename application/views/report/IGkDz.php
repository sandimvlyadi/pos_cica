<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title; ?></title>
    <style type="text/css">
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        img {
            height: 150px;
            width: 150px;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            font-weight: bold;
            text-align: center;
            background-color: blue;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        h2 {
            padding-top: 50px;
            text-align: center;
        }

        p {
            padding-top: 100px;
        }
    </style>
</head>
<body>

<table>
    <tr>
        <td style="width: 150px;"><img src="<?php echo $logo; ?>"></td>
        <td>
            <span style="font-weight: bold; font-size: 23px;">KALISUSU CAFE AND RESTO</span><br>
            Jl. Raya Patrol – Anjatan Desa Limpas Kecamatan Patrol – Indramayu<br>
            Telepon : 082128892257
        </td>
    </tr>
</table>

<h2><?php echo $title; ?></h2>

<table>
  <tr>
    <?php for ($i=0; $i < count($thead); $i++) { ?>
        <th><?php echo $thead[$i]; ?></th>
    <?php } ?>
  </tr>
  <?php for ($i=0; $i < count($tbody); $i++) { ?>
      <tr>
        <td><?php echo $i+1; ?></td>
        <td><?php echo $tbody[$i]['id_bahan_baku_keluar']; ?></td>
        <td><?php echo $tbody[$i]['bahan_baku']; ?></td>
        <td><?php echo $tbody[$i]['qty']; ?></td>
        <td><?php echo $tbody[$i]['created']; ?></td>
      </tr>
  <?php } ?>
</table>

<p>Dicetak Tanggal : <?php echo date('d/M/Y'); ?></p>

<script type="text/javascript">
    window.onload = function(){ 
        window.print();
    }
</script>

</body>
</html>