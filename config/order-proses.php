<?php
								  	$total = 0;
								  	if (isset($_POST['proses'])) {
								  		$pilihan = $_POST['pilih'];
											foreach ($queryMenu as $menu) {
												$pilihanMenu = $menu['id_menu'];
												for ($i=0; $i < count($pilihan); $i++) { 
													if ($pilihan[$i] == $menu['nama_menu']) {

												
														$total = $total+($menu['harga']*$_POST[$pilihanMenu]);
													}
												}
											}
											
										}
									
								  ?>