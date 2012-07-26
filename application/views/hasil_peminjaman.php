<html>
<head>
	<title>Library Totalindo</title>
</head>
<body>

<p>Peminjaman</p>


<h2>List Peminjaman</h2>

<br/>
<table  style="border: black 1px solid" border="1">
	<tr>
		<td>Peminjam</td>
		<td>Judul Buku</td>
		<td>Tanggal Peminjaman</td>
		<td>Tanggal Pengembalian</td>
		<td>Action</td>
	</tr>
	<?php foreach ($hasil_search as $rows){?>
	<tr>
		<td>.....</td>
		<td>.....</td>
		<td>.....</td>
		<td>.....</td>
		<td><?php echo anchor('peminjaman_cont/get_detail_peminjaman','view');?></td>
	</tr>
	<?php }?>
</table>
</body>
</html>