<?php require_once APP_ROOT . '/views/admin/inc/head.php'; ?>


	<!-- <section class="tg-dash">
		<h1>Student Listing</h1>
	</section> -->
	<section class="main-tbl-container">
		<div class="tbl-wrap">
			<div class="content-head">
				<h2>System logs</h2>
			</div>
			<div class="sortby filter-category">
				<div id="sort-drop">
					<span>Sort event:</span>
					<select>
						<optgroup>
							<?php foreach ($data['dept'] as $dept) : ?>
								<option><?php echo $dept->name;?></option>
							<?php endforeach; ?>
						</optgroup>
					</select>
				</div>
				<div id="search-sort">
					<input type="text" name="search" placeholder="Search Here">
					<i class="fal fa-search"></i>
				</div>
			</div><!-- End of Sorting -->
			<div class="job-list-tables cc_tbl_pagination">
				<table>
					<thead>
						<tr>
							<!-- <th style="text-align: center;"><input type="checkbox" name=""></th> -->
							<th colspan="2" style="width: 220px;">Name</th>
							<!-- <th>User Type</th> -->
							<th>Event</th>
							<th>Date</th>
							<th>Time</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody id="data-container">
						<!-- if job is close add row with class name "sold" -->
						<?php foreach($data['student'] as $student): ?>
						<tr class="req_logs_">
							<td style="text-align: center;" class="ch-selection-item-action">
								<div class="ch-checkbox-item" data-checked></div>
								<!-- <input type="checkbox" name=""> -->
							</td>
							<td class="ch-row-second">
								<div class="request_icon_wrapper">
									<div class="req_icon">
										<span><?=$student->student_name[0];?></span>
									</div>
									<div class="cc-name" style="margin:5px;margin-top:0px;">
										<h3><?=$student->student_name;?></h3>
										<time datetime="2017-08-08">01 Day Ago</time>
									</div>
								</div>
							</td>
							<!-- <td class="tittle-id">
								<h3>Student</h3>
							</td> -->
							<td class="tittle-id">
								<h3><?=$student->department;?> Department</h3>
							</td>
							<td>
								<span><?=$student->student_id;?></span>
							</td>
							<td>
								<span><?=$student->student_id;?></span>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- End of Table Design -->
			<div class="box cc-pagination-footer index_native"></div>
		</div>
	</section>

<?php require_once APP_ROOT . '/views/admin/inc/footer.php'; ?>