						<!-- if job is close add row with class name "sold" -->
						<?php for($i = 0; $i < 5; $i++) : ?>
						<tr>
							<td style="text-align: center;">
								<input type="checkbox" name="">
							</td>
							<td>
								<div class="request_icon_wrapper">
									<div class="req_icon">
										<span>C</span>
									</div>
									<div style="margin:5px;margin-top:0px;">
										<h3>Clint Anthony Abueva</h3>
										<p>Student No: <span>02131011</span></p>
									</div>
								</div>
							</td>
							<!-- <td class="tittle-id">
								<h3>Student</h3>
							</td> -->
							<td class="tittle-id">
								<h3>Geology Department</h3>
							</td>
							<td>
								<span>02131011</span>
							</td>
							<td class="action-btn">
								<span class="eye" data-jId="<?=$job->jId;?>"><i class="fal fa-eye"></i></span>
								<span class="pencil" data-jId="<?=$job->jId;?>"><i class="fal fa-pencil-alt"></i></span>
								<span class="trash" data-jId="<?=$job->jId;?>"><i class="fal fa-trash"></i></span>
							</td>
						</tr>
						<tr>
							<td style="text-align: center;">
								<input type="checkbox" name="">
							</td>
							<td>
								<div class="request_icon_wrapper">
									<div class="req_icon">
										<img src="<?=URL_ROOT?>/img/prof.png" alt="">
									</div>
									<div style="margin:5px;margin-top:0px;">
										<h3>Clint Anthony Abueva</h3>
										<p>Student No: <span>02131011</span></p>
									</div>
								</div>
							</td>
							<!-- <td class="tittle-id">
								<h3>Student</h3>
							</td> -->
							<td class="tittle-id">
								<h3>Geology Department</h3>
							</td>
							<td>
								<span>02131011</span>
							</td>
							<td class="action-btn">
								<span class="eye" data-jId="<?=$job->jId;?>"><i class="fal fa-eye"></i></span>
								<span class="pencil" data-jId="<?=$job->jId;?>"><i class="fal fa-pencil-alt"></i></span>
								<span class="trash" data-jId="<?=$job->jId;?>"><i class="fal fa-trash"></i></span>
							</td>
						</tr>
						<?php endfor; ?>