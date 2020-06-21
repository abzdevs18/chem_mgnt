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
					<span>Filter event:</span>
					<select id="event-filter-id">
						<optgroup>
							<?php foreach ($data['dept'] as $dept) : ?>
								<option><?php echo $dept->name;?></option>
							<?php endforeach; ?>
						</optgroup>
					</select>
				</div>
				<div id="search-sort">
					<input type="text" name="search" placeholder="Search Here name, event or date" id="event-search-filter">
					<i class="fal fa-search"></i>
				</div>
			</div><!-- End of Sorting -->
			<div class="job-list-tables cc_tbl_pagination">
				<table id="log-filter-table">
					<thead>
						<tr>
							<!-- <th style="text-align: center;"><input type="checkbox" name=""></th> -->
							<th colspan="2" style="width: 120px;">Name</th>
							<th>User Type</th>
							<th>Event</th>
							<th>Date</th>
							<th>Time</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody id="data-container">
						<!-- if job is close add row with class name "sold" -->
						<?php foreach($data['logs'] as $log): ?>
						<tr class="req_logs_ log_td" style="background:<?=($log->status) ? "#0080001a" : "#ff00001a"?>">
							<td style="text-align: center;width: 1px;background: var(--hover-dark-font);">
								<!-- <input type="checkbox" name=""> -->
							</td>
							<td>
								<span><?=$log->name;?></span>
							</td>
							<td class="tittle-id">
								<?php if($log->userType == 0): ?>
									<span>Admin</span>
								<?php elseif($log->userType == 1): ?>
									<span>Admin</span>
								<?php else: ?>
									<span>Student</span>
								<?php endif;?>
							</td>
							<td class="tittle-id">
								<h3><?=$log->event;?></h3>
							</td>
							<td>
								<span><?=$log->date;?></span>
							</td>
							<td>
								<span><?=$log->time;?></span>
							</td>
							<td>
								<?php if($log->status == 1): ?>
									<span class="log_suc">Success</span>
								<?php else: ?>
									<span class="log_err">Failed</span>
								<?php endif;?>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- End of Table Design -->
			<div class="box cc-pagination-footer index_native" data-rows="5"></div>
		</div> 
	</section>

<?php require_once APP_ROOT . '/views/admin/inc/footer.php'; ?>