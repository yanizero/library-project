<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <title>Codeigniter Autocomplete</title>
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />
        <link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/   css" media="all" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>
        <meta charset="UTF-8">
         
        <style>
            /* Autocomplete
            ----------------------------------*/
            .ui-autocomplete { position: absolute; cursor: default; }   
            .ui-autocomplete-loading { background: white url('http://jquery-ui.googlecode.com/svn/tags/1.8.2/themes/flick/images/ui-anim_basic_16x16.gif') right center no-repeat; }*/
 
            /* workarounds */
            * html .ui-autocomplete { width:1px; } /* without this, the menu expands to 100% in IE6 */
 
            /* Menu
            ----------------------------------*/
            .ui-menu {
                list-style:none;
                padding: 2px;
                margin: 0;
                display:block;
            }
            .ui-menu .ui-menu {
                margin-top: -3px;
            }
            .ui-menu .ui-menu-item {
                margin:0;
                padding: 0;
                zoom: 1;
                float: left;
                clear: left;
                width: 100%;
                font-size:80%;
            }
            .ui-menu .ui-menu-item a {
                text-decoration:none;
                display:block;
                padding:.2em .4em;
                line-height:1.5;
                zoom:1;
            }
            .ui-menu .ui-menu-item a.ui-state-hover,
            .ui-menu .ui-menu-item a.ui-state-active {
                font-weight: normal;
                margin: -1px;
            }
        </style>
         
        <script type="text/javascript">
        $(this).ready( function() {
            $("#autocomplete").autocomplete({
                minLength: 1,
                source: 
                function(req, add){
                    $.ajax({
                        url: "<?php echo base_url(); ?>index.php/peminjaman_cont/lookup",
                        dataType: 'json',
                        type: 'POST',
                        data: req,
                        success:    
                        function(data){
                            if(data.response =="true"){
                                add(data.message);
                            }
                        },
                    });
                },
            select: 
                function(event, ui) {
                    $("#result").append(
                        "<li>"+ ui.item.value + "</li>"
                    );                  
                },      
            });
        });
        </script>
         
    </head>
    <body>
 <p>Catat Peminjaman</p>
<?php echo form_open('peminjaman_cont/add_peminjaman');?>
	<table  border="0">
		<tr>
			<td>Nim</td>
			<td><?php echo form_input('nim');?></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td><?php echo form_input('nama','','id="autocomplete"')?></td>
		</tr>
		<tr>
			<td>Kode Buku</td>
			<td><?php echo form_input('kode_buku')?></td>
		</tr>
		<tr>
			<td>Judul Buku</td>
			<td><?php echo form_input('judul_buku')?></td>
		</tr>
		<tr>
			<td>Tanggl Kembali</td>
			<td><?php echo form_input('tanggal_kembali')?></td>
		</tr>
	</table>
	<?php echo form_submit('submit','tambah')?>
<?php echo form_close();?>
        
    </body>
</html>