<?php require_once APP_ROOT . '/views/admin/inc/head.php'; ?>


	<!-- <section class="tg-dash">
		<h1>Student Listing</h1>
	</section> -->
	<section class="main-tbl-container">
		<div class="tbl-wrap">
			<div class="content-head">
				<h2>Registered Students<?php print_r($data['one']);?></h2>
			</div>
			<div class="sortby filter-category">
				<div id="sort-drop">
					<span>Sort by:</span>
					<select>
						<optgroup>
							<option selected>Geology Department</option>
							<option>Most Recent</option>
							<option>Most Recent</option>
							<option>Most Recent</option>
						</optgroup>
					</select>
				</div>
				<div id="search-sort">
					<input type="text" name="search" placeholder="Search Here">
					<i class="fal fa-search"></i>
				</div>
			</div><!-- End of Sorting -->
			<div class="job-list-tables">
				<table>
					<thead>
						<tr>
							<th style="text-align: center;"><input type="checkbox" name=""></th>
							<th>Name</th>
							<!-- <th>User Type</th> -->
							<th>Department</th>
							<th>Student No.</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody id="data-container">
						<!-- if job is close add row with class name "sold" -->
						<?php for($i = 0; $i < 3; $i++) : ?>
						<tr>
							<td style="text-align: center;" class="ch-check-box">
								<!-- <input type="checkbox" name=""> -->
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
					</tbody>
					<div id="pagination-container"></div>
				</table>
			</div><!-- End of Table Design -->
		</div>
	</section>

<?php require_once APP_ROOT . '/views/admin/inc/footer.php'; ?>