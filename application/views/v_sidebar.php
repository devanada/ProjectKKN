<!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                  <ul class="list-unstyled components">
                    <a href="#">
                    </a>
                </li>
                <li>
                     <a href="<?php echo base_url();?>index.php/Dosen/beranda_dppm"  font-size="80px">SELAMAT DATANG</a>
                </li>
                
                <li>
                    <ul class="nav nav-stacked" id="accordion2">
                        <li class="panel"> <a data-toggle="collapse" data-parent="#accordion2" href="#secondaryLink2"><strong>SETTING KELOMPOK</strong></a>
                              <ul id="secondaryLink2" class="collapse">
                                    <a href="<?php echo base_url();?>index.php/Dosen/set_kelompok"><strong>TAMBAH KEL</strong></a>
                                    <a href="<?php echo base_url();?>index.php/Dosen/lihat_kelompok"><strong>DAFTAR KEL</strong></a>
                              </ul>
                        </li>
                        <li class="panel"> <a data-toggle="collapse" data-parent="#accordion2">
                    </li>
                </li>


                
                <li>
                    <ul class="nav nav-stacked" id="accordion1">
                        <li class="panel"> <a data-toggle="collapse" data-parent="#accordion1" href="#secondaryLink"><strong>SETTING DPL</strong></a>
                              <ul id="secondaryLink" class="collapse">
                                    <a href="<?php echo base_url();?>index.php/Dosen/set_dpl"><strong>TAMBAH DPL</strong></a>
                                    <a href="<?php echo base_url();?>index.php/Dosen/lihat_dpl"><strong>DAFTAR DPL</strong></a>
                              </ul>
                        </li>
                        <li class="panel"> <a data-toggle="collapse" data-parent="#accordion1">
                    </li>
                </li>

                 <ul class="nav nav-stacked" id="accordion3">
                        <li class="panel"> <a data-toggle="collapse" data-parent="#accordion3" href="#secondaryLink3"><strong>KELOLA PESERTA KKN</strong></a>
                              <ul id="secondaryLink3" class="collapse">
                                    <a href="<?php echo base_url();?>index.php/Dosen/setmhsfix"><strong>Daftar Peserta</strong></a>
                                    <a href="<?php echo base_url();?>index.php/Dosen/kelola_peserta"><strong>Kelola Registrasi</strong></a>
                              </ul>
                        </li>
                <li class="panel"> <a data-toggle="collapse" data-parent="#accordion3"></li>




                <li>
                    <a href="<?php echo base_url();?>index.php/Dosen/kelola_nilai_dppm"><strong>DAFTAR NILAI</strong></a>
                </li>
                
                <li>
                    <a href="<?php echo base_url();?>index.php/Dosen/keluar"><strong>LOG OUT</strong></a>
                </li>

            </ul>
        </div>
<!-- /#sidebar-wrapper -->