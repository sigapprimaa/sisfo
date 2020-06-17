 <!-- Begin Page Content -->
<div class="container-fluid">
 <!-- DataTales Example -->
    <!-- DataTales Example -->
   <!-- Ga semua SG dapet tali asih dari user -->
           <div class="card shadow mb-4">
               <div class="card-header py-3">
                 <h6 class="m-0 font-weight-bold text-primary">Cari Kelengkapan Berkas  Karyawan</h6>
               </div>
               <div class="card-body">
   <div class="table-responsive-sm ml-4 mr-3">
    <div class="form-group">
      <form action="" method="POST">
      <input type="text" autofocus="on" autocomplete="off" id="keyword" name="keyword" class="form-control" placeholder="Cari Berdasarkan NPK">
      <button class="btn btn-primary btn-info mt-2" id="btn"><i class="fa fa-search"></i> Cari </button>
      <button class="btn btn-danger btn-info mt-2" id="btn-2" style="display: none;"><i class="fa fa-history"></i> Reset </button>

    </form>
    </div>
   </div>
   </div>
   </div>

   <!-- muncul dengan metode ajax  -->
   <div  id="review-data">

         
        </div>
   </div>

<script type="text/javascript">
  $(document).ready(function(){

      $("#btn").click(function(event){
        var keyword = document.getElementById('keyword').value ;
        event.preventDefault();
          if(keyword == ""){
             swal({
              icon : "error",
              title : "Keyword Kosong",
              dangerMode : [true,"Ok"]
             })
          }else {
                $.ajax({
                url : "<?= base_url("superadmin/Berkas/loadBerkas") ?>",
                data : "keyword="+ keyword,
                method : "POST",
                success : function(msg){
                  $("#review-data").html(msg);
                  $("#btn-2").show();
                }
            })            
          }

      })
  })
</script>    

