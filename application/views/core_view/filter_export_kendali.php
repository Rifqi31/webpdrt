<div class="row">
   <form action="<?php echo base_url();?>kendalicrud/export_filter" method="post">
         <div class="col-sm-2" style="padding-left:30px;">
            <select class="form-control form-inline" id="select_kecamatan" name="kecamatan">
                <option value="base" selected>Pilih kecamatan</option>
                <option value="Babakan Madang">Babakan Madang</option>
                <option value="Bojonggede">Bojonggede</option>
                <option value="Caringin">Caringin</option>
                <option value="Cariu">Cariu</option>
                <option value="Ciampea">Ciampea</option>
                <option value="Ciawi">Ciawi</option>
                <option value="Cibinong">Cibinong</option>
                <option value="Cibungbulang">Cibungbulang</option>
                <option value="Cigombong">Cigombong</option>
                <option value="Cigudeg">Cigudeg</option>
                <option value="Cijeruk">Cijeruk</option>
                <option value="Cileungsi">Cileungsi</option>
                <option value="Ciomas">Ciomas</option>
                <option value="Cisarua">Cisarua</option>
                <option value="Ciseeng">Ciseeng</option>
                <option value="Citereup">Citereup</option>
                <option value="Dramaga">Dramaga</option>
                <option value="Gunung Putri">Gunung Putri</option>
                <option value="Gunung Sindur">Gunung Sindur</option>
                <option value="Jasinga">Jasinga</option>
                <option value="Jonggol">Jonggol</option>
                <option value="Kemang">Kemang</option>
                <option value="Klapanunggal">Klapanunggal</option>
                <option value="Leuwiliang">Leuwiliang</option>
                <option value="Leuwisadeng">Leuwisadeng</option>
                <option value="Megamendung">Megamendung</option>
                <option value="Nanggung">Nanggung</option>
                <option value="Pamijahan">Pamijahan</option>
                <option value="Parung">Parung</option>
                <option value="Parung Panjang">Parung Panjang</option>
                <option value="Ranca Bungur">Ranca Bungur</option>
                <option value="Rumpin">Rumpin</option>
                <option value="Sukajaya">Sukajaya</option>
                <option value="Sukamakmur">Sukamakmur</option>
                <option value="Sukaraja">Sukaraja</option>
                <option value="Tajur halang">Tajur halang</option>
                <option value="Tamansari">Tamansari</option>
                <option value="Tanjungsari">Tanjungsari</option>
                <option value="Tenjo">Tenjo</option>
                <option value="Tenjolaya">Tenjolaya</option>
            </select>
        </div>
        <div class="col-sm-2">
            <select class="form-control" id="select_desa_kel" name="desa_kel">
                <option>Pilih Desa/Kelurahan</option>
            </select>
        </div>  
        <div class="col-md-1">
            <button class="btn btn-success"><i class="fa fa-file-excel-o"></i> Export</button>
        </div>
    </form>

    <form action="<?php echo base_url(); ?>kendalicrud/export_range" method="post" id="form_range_tanggal2">
        <div class="col-md-4" style="padding-left:240px;">
            <input type="text" class="form-control form-inline" name="tgl_awal" id="datetimepicker16" placeholder="tanggal awal">
        </div>
        <div class="col-md-2">
            <input type="text" class="form-control form-inline" name="tgl_akhir" id="datetimepicker17" placeholder="tanggal akhir">
        </div>
        <div class="col-md-1">
            <button class="btn btn-success"><i class="fa fa-file-excel-o"></i> Export</button>
        </div>
    </form>
</div>