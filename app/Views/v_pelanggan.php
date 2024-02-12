<?= $this->extend('layout/admin'); ?>

<?= $this->section('content'); ?>
  <body>
    <h1>Data Pelanggan</h1>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
            <div class="card">  
            <div class="card-header">
                Tambah Data
            </div>
            <div class="card-body">
                <form>
                <div class="row mb-3">
                    <label for="nama_produk" class="col-sm-4 col-form-label">Nama Pelanggan</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="nama_pelanggan">
                    <input type="hidden" id="status">
                    <input type="hidden" id="id_pelanggan">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="harga" class="col-sm-4 col-form-label">Alamat</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="alamat">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="stok" class="col-sm-4 col-form-label">No Telp</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="no_telp">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
                </form>
            </div>
            </div>
            </div>
            <div class="col-sm-6">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Pelanggan</th>
                            <th>Alamat</th>
                            <th>No Telp</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="showData">
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="<?= base_url()?>adminlte/plugins/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            tampil_data();

            function tampil_data(){
                $.ajax({ //setelah isi ajax, tambah routes
                    url: 'pelanggan/tampil',
                    type: 'get',
                    dataType: 'json',
                    success: function(data)
                    {
                        console.log(data);
                        var HTML = '';
                        var i;
                        var no = 0;
                        if(data.length == 0) {
                            HTML += '<tr>' + 
                                    '<td colspan = "5" class = "text-center"> Data pada tabel masih kosong</td>'+
                                    '</tr>'

                            $('#showData').html(HTML);
                        }else{
                            for (var i = 0; i < data.length; i++) {
                            no++;
                            HTML += '<tr>' +
                                '<td>' + no + '</td>' +
                                '<td>' + data[i].nama_pelanggan + '</td>' +
                                '<td>' + data[i].alamat + '</td>' +
                                '<td>' + data[i].no_telp + '</td>' +
                                '<td>' +
                                    '<button id="edit" data-id="' + data[i].id_pelanggan + '" class="btn btn-warning">Edit</button>' + 
                                    '&nbsp;&nbsp;' + 
                                    '<button id="hapus" data-id="' + data[i].id_pelanggan + '" class="btn btn-danger">Hapus</button>' +
                                '</td>' +
                                '</tr>';
                                $('#showData').html(HTML)
                        }
                        }
                    }
                });
            }
                        $('#simpan').on('click', function(e){
                            e.preventDefault();
                            
                            var namaPelanggan = $('#nama_pelanggan').val();
                            var alamat = $('#alamat').val();
                            var no_telp = $('#no_telp').val();
                            var status = $('#status').val();
                            var id = $('#id_pelanggan').val();

                            if (status == '') {
                                $.ajax({
                                url: 'pelanggan/simpan',
                                type: 'post',
                                data: {namaPelanggan: namaPelanggan, alamat: alamat, no_telp: no_telp},
                                success: function(data){
                                    $('#nama_pelanggan').val('');
                                    $('#alamat').val('');
                                    $('#no_telp').val('');

                                    tampil_data();
                                }
                            })
                            }else if (status == 'update'){
                                $.ajax({
                                url: 'pelanggan/update',
                                type: 'post',
                                data: {id: id, namaPelanggan: namaPelanggan, alamat: alamat, no_telp: no_telp},
                                success: function(data){
                                    $('#nama_pelanggan').val('');
                                    $('#alamat').val('');
                                    $('#no_telp').val('');
                                    $('#status').val('');

                                    tampil_data();
                                }
                            })

                            }  
                        }); //end simpan

                        //edit
                        $('#showData').on('click', '#edit', function(e){
                            e.preventDefault();

                            var id = $(this).data('id');

                            $.ajax({
                                url: 'pelanggan/edit',
                                type: 'get',
                                dataType: 'json',
                                data: {id: id},

                                success: function(data){
                                    console.log(data);

                                    $('#id_pelanggan').val(data.id_pelanggan);
                                    $('#nama_pelanggan').val(data.nama_pelanggan);
                                    $('#alamat').val(data.alamat);
                                    $('#no_telp').val(data.no_telp);
                                    $('#status').val('update');
                                }
                            })
                        });

                        //update
                        $('#update').on('click', function(e){
                            e.preventDefault();

                            var namaPelanggan = $(this).data('namaPelanggan');
                            var alamat = $(this).data('namaPelanggan');
                            var no_telp = $(this).data('namaPelanggan');

                            $.ajax({
                                url: 'pelanggan/update',
                                type: 'post',
                                data: {namaPelanggan: namaPelanggan, alamat: alamat, no_telp: no_telp},
                                success:function(data) {
                                    $('#nama_pelanggan').val('');
                                    $('#alamat').val('');
                                    $('#no_telp').val('');

                                    tampil_data();
                                }
                            })
                        }) //end update

                        //delete
                        $('#showData').on('click', '#hapus', function(e){
                            e.preventDefault();

                            var id = $(this).data('id');
                            console.log('Berhasil Dihapus');

                            $.ajax({
                                method: 'post',
                                url: 'pelanggan/delete',
                                data: {id: id},
                                success:function(data) {

                                    tampil_data();
                                    $('id_pelanggan').focus();
                                }
                            })
                        });
            });
    </script>
  </body>
  <?= $this->endSection(); ?>