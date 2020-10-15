<div id="page">
    <div class="page-content header-clear-small">
        <div data-height="130" class="caption caption-margins round-medium shadow-huge">
            <div class="caption-center left-15 text-left">
                <h1 class="color-white bolder" id="tgl">
                <?php
                  echo tgl_indo(date('Y-m-d'));
                ?>
                </h1>
                <p class="under-heading color-white opacity-90 bottom-0">
                    Informasi terkini terkait Covid-19 Di Sumatera Utara
                </p>
            </div>
            <div class="caption-overlay bg-black opacity-70"></div>
            <div class="caption-bg bg-18"></div>
        </div>
        <div class="content-boxed">
            <div class="content">
                <h1 class="bolder center-text">KASUS COVID-19 SUMATERA UTARA</h1>
                <!-- <p class="under-heading font-12 center-text color-highlight bottom-10"> Update terakhir </p> -->
                <div class="divider"></div>
                <div class="grid-columns">
                  <div class="col-md-3">
                        <h3 class="bolder">ODP</h3>
                      <h4>
                        <?php echo number_format($odp->jumlah,0,'.','.');?>
                      </h4>
                  </div>
                  <div class="col-md-3">
                      <h3 class="bolder">PDP</h3>
                      <h4>
                          <?php echo number_format($pdp->jumlah,0,'.','.');?>
                      </h4>
                  </div>
                  <div class="col-md-3">
                          <h3 class="bolder">Positif</h3>
                        <h4>
                          <?php echo number_format($positif->jumlah,0,'.','.');?>
                        </h4>
                    </div>
                    <div class="col-md-3">
                        <h3 class="bolder">Sembuh</h3>
                        <h4>
                            <?php echo number_format($sembuh->jumlah,0,'.','.');?>
                        </h4>
                  </div>
                </div>
            </div>
        </div>
        <div class="content-boxed">
            <div class="content">
                   <center>
                         <div>
                        <h3 class="bolder">Meninggal</h3>
                        <h4>
                          <?php echo number_format($meninggal->jumlah,0,'.','.');?>
                        </h4>
                    </div>
                   </center>
            </div>
        </div>
        <div class="content-boxed">
            <div class="content">
                <h1 class="bolder center-text">PETA COVID-19 SUMATERA UTARA</h1>
                <!-- <p class="under-heading font-12 center-text color-highlight bottom-10"> Update terakhir <?=$datasumut['update'];?></p> -->
                <div class="divider"></div>
                <div id="map" style="width:100%;height:520px;"></div>
                  <script>
                  var map;
                  function initMap(marker) {
                    map = new google.maps.Map(document.getElementById('map'), {
                      center: {lat: 1.8353857, lng: 96.4965861},
                      zoom: 7
                    });

                    setMarkers(map)
                  }

                  function setMarkers(map){
                    $.ajax({
                      url:'<?php echo base_url('info/clusterMap');?>',
                      success:function(data){
                          var markers = [];
                          var data = JSON.parse(data);
                          $.each(data['Meninggal'],function(key,val){
                            var marker = new google.maps.Marker({
                              position: {lat: parseFloat(val.lat), lng: parseFloat(val.lng)},
                              map: map,
                              icon: {
                                url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"
                              },
                              url:"https://www.google.com/maps/place/"+val.lokasi+"/@"+parseFloat(val.lat)+","+parseFloat(val.lng)+',7z',
                            });
                            google.maps.event.addListener(marker, 'click', function() {
                                window.open(this.url,'_blank');
                            });
                            markers.push(marker);
                          })

                          $.each(data['PDP'],function(key,val){
                            var marker = new google.maps.Marker({
                              position: {lat: parseFloat(val.lat), lng: parseFloat(val.lng)},
                              map: map,
                              icon: {
                                url: "http://maps.google.com/mapfiles/ms/icons/orange-dot.png"
                              },
                              url:"https://www.google.com/maps/place/"+val.lokasi+"/@"+parseFloat(val.lat)+","+parseFloat(val.lng)+',7z',
                            });
                            google.maps.event.addListener(marker, 'click', function() {
                                window.open(this.url,'_blank');
                            });
                            markers.push(marker);
                          })

                          $.each(data['ODP'],function(key,val){
                            var marker = new google.maps.Marker({
                              position: {lat: parseFloat(val.lat), lng: parseFloat(val.lng)},
                              map: map,
                              icon: {
                                url: "http://maps.google.com/mapfiles/ms/icons/yellow-dot.png"
                              },
                              url:"https://www.google.com/maps/place/"+val.lokasi+"/@"+parseFloat(val.lat)+","+parseFloat(val.lng)+',7z',
                            });
                            google.maps.event.addListener(marker, 'click', function() {
                                window.open(this.url,'_blank');
                            });
                            markers.push(marker);
                          })

                          $.each(data['Positif'],function(key,val){
                            var marker = new google.maps.Marker({
                              position: {lat: parseFloat(val.lat), lng: parseFloat(val.lng)},
                              map: map,
                              icon: {
                                url: "http://maps.google.com/mapfiles/ms/icons/red-dot.png"
                              },
                              url:"https://www.google.com/maps/place/"+val.lokasi+"/@"+parseFloat(val.lat)+","+parseFloat(val.lng)+',7z',
                            });

                            google.maps.event.addListener(marker, 'click', function() {
                                window.open(this.url,'_blank');
                            });
                            markers.push(marker);
                          })

                          var markerCluster = new MarkerClusterer(map, markers,
                              {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});

                      }
                    })

                  }
                  </script>
                  <script src="https://unpkg.com/@google/markerclustererplus@4.0.1/dist/markerclustererplus.min.js"></script>
                  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHZ7CMaiMHODHr0aEcrwOkjeOUZ7Z2e9Q&callback=initMap"
                  async defer></script>
                  <br/>
                  <div class="row">
                    <table>
                      <thead>
                        <tr>
                          <th>Simbol</th>
                          <th>Keterangan</th>
                        </tr>
                        <tr>
                          <td class="text-center"><img src="http://maps.google.com/mapfiles/ms/icons/blue-dot.png"></td>
                          <td><b>Meninggal</b></td>
                        </tr>
                        <tr>
                          <td class="text-center"><img src="http://maps.google.com/mapfiles/ms/icons/orange-dot.png"></td>
                          <td><b>PDP</b></td>
                        </tr>
                        <tr>
                          <td class="text-center"><img src="http://maps.google.com/mapfiles/ms/icons/yellow-dot.png"></td>
                          <td><b>ODP</b></td>
                        </tr>
                        <tr>
                          <td class="text-center"><img src="http://maps.google.com/mapfiles/ms/icons/red-dot.png"></td>
                          <td><b>Positif</b></td>
                        </tr>
                      </thead>
                    </table>
                  </div>
            </div>
        </div>
</div>
