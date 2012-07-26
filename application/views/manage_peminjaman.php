<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <title>Codeigniter Autocomplete</title>
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />
        <link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/   css" media="all" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>
         <script src="js/messi.js" type="text/javascript"></script>
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
                        url: "<?php echo base_url(); ?>index.php/peminjaman_cont/lookup_nim",/*change with book lookuap*/
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
         <script>
		    jQuery.noConflict ();
		    (function($) {
		      $(document).ready(function() {
		        
		        $('#show-hide-code').bind('click', function() {
		          $('.code').toggle();
		        });
		        
		        // Examples:
		        
		        $('#simple').bind('click', function() {
		          new Messi('This is a message with Messi.');
		        });
		      });
		    })(jQuery);
        </script>
    </head>
<body>

<a href="#" id="simple">Simple message</a>
<h2><?php echo anchor('peminjaman_cont','List Peminjaman')?></h2>

<br/>

<?php echo form_open('peminjaman_cont/search_peminjaman');?>
	<?php echo form_input('keyword','','id="autocomplete"');?>
	<?php echo form_submit('submit','cari')?>
<?php echo form_close();?>
<br />
<?php echo anchor('peminjaman_cont/load_view_add_peminjaman','tambah');?>

<br />
<?php if($flag_notify){
			echo $success_message;
	 }?>
	 

<table  style="border: black 1px solid" border="1">
	<tr>
		<td>Peminjam</td>
		<td>Judul Buku</td>
		<td>Tanggal Peminjaman</td>
		<td>Tanggal Harus Kembali</td>
		<td colspan="2">Action</td>
	</tr>
	<?php foreach($list_peminjaman as $single_peminjaman){	?>
	<tr>
		<td><?php echo $single_peminjaman['nim']?></td>
		<td><?php echo $single_peminjaman['judul_buku']?></td>
		<td><?php echo $single_peminjaman['tanggal_pinjam']?>.</td>
		<td><?php echo $single_peminjaman['tanggal_kembali']?></td>
		<td><?php echo anchor('peminjaman_cont/get_detail_peminjaman/'.$single_peminjaman['id_peminjaman'],'lihat');?></td>
		<td><?php echo anchor('peminjaman_cont/load_view_akhiri_peminjaman/'.$single_peminjaman['id_peminjaman'],'pengembalian');?></td>
	</tr>
	<?php }?>
</table>
</body>
</html>