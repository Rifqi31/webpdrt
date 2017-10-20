$(function() {

  $("#pilih_kecamatan").change(function() {

    var $dropdown = $(this);

    $.getJSON("http://127.0.0.1/webpdrt/assets/json/data_desa.json", function(data) {

      var key = $dropdown.val();
      var vals = [];

      switch(key) {
        case 'Babakan Madang':
          vals = data.babakanmadang.split(",");
          break;
        case 'Bojonggede':
          vals = data.bojonggede.split(",");
          break;
        case 'Caringin':
          vals = data.caringin.split(",");
          break;
        case 'Cariu':
          vals = data.cariu.split(",");
          break;
        case 'Ciampea':
            vals = data.ciampea.split(",");
          break;
        case 'Ciawi':
            vals = data.ciawi.split(",");
          break;
        case 'Cibinong':
            vals = data.cibinong.split(",");
          break;
        case 'Cibungbulang':
            vals = data.cibungbulang.split(",");
          break;
        case 'Cigombong':
            vals = data.cigombong.split(",");
          break;
        case 'Cigudeg':
            vals = data.cigudeg.split(",");
          break;
        case 'Cijeruk':
            vals = data.cijeruk.split(",");
          break;
        case 'Cileungsi':
            vals = data.cileungsi.split(",");
          break;
        case 'Ciomas':
            vals = data.ciomas.split(",");
          break;
        case 'Cisarua':
            vals = data.cisarua.split(",");
          break;
        case 'Ciseeng':
            vals = data.ciseeng.split(",");
          break;
        case 'Citereup':
            vals = data.citereup.split(",");
          break;
        case 'Dramaga':
            vals = data.dramaga.split(",");
          break;
        case 'Gunung Putri':
            vals = data.gunungputri.split(",");
          break;
        case 'Gunung Sindur':
            vals = data.gunungsindur.split(",");
          break;
        case 'Jasinga':
            vals = data.jasinga.split(",");
          break;
        case 'Jonggol':
            vals = data.jonggol.split(",");
          break;
        case 'Kemang':
            vals = data.kemang.split(",");
          break;
        case 'Klapanunggal':
            vals = data.klapanunggal.split(",");
          break;
        case 'Leuwiliang':
            vals = data.leuwiliang.split(",");
          break;
        case 'Leuwisadeng':
            vals = data.leuwisadeng.split(",");
          break;
        case 'Megamendung':
            vals = data.megamendung.split(",");
          break;
        case 'Nanggung':
            vals = data.nanggung.split(",");
          break;
        case 'Pamijahan':
            vals = data.pamijahan.split(",");
          break;
        case 'Parung':
            vals = data.parung.split(",");
          break;
        case 'Parung Panjang':
            vals = data.parungpanjang.split(",");
          break;
        case 'Ranca Bungur':
            vals = data.rancabungur.split(",");
          break;
        case 'Rumpin':
            vals = data.rumpin.split(",");
          break;
        case 'Sukajaya':
            vals = data.sukajaya.split(",");
          break;
        case 'Sukamakmur':
            vals = data.sukamakmur.split(",");
          break;
        case 'Sukaraja':
            vals = data.sukaraja.split(",");
          break;
        case 'Tajur halang':
            vals = data.tajurhalang.split(",");
          break;
        case 'Tamansari':
            vals = data.tamansari.split(",");
          break;
        case 'Tanjungsari':
            vals = data.tanjungsari.split(",");
          break;
        case 'Tenjo':
            vals = data.tenjo.split(",");
          break;
        case 'Tenjolaya':
            vals = data.tenjolaya.split(",");
          break;

        case 'base':
          vals = ['Pilih Desa/Kelurahan'];
      }

      var $pilih_desa_kel = $("#pilih_desa_kel");
      $pilih_desa_kel.empty();
      $.each(vals, function(index, value) {
        $pilih_desa_kel.append("<option>" + value + "</option>");
      });

    });
  });

});