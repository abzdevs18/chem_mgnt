<?php require_once APP_ROOT . '/views/admin/inc/head.php'; ?>


	<!-- <section class="tg-dash">
		<h1>Pending Request</h1>
	</section> -->
	<section class="main-tbl-container">
		<div class="tbl-wrap">
			<div class="content-head">
				<h2>Pending Request <sup><i class="fal fa-question-circle" style="font-size:12px;" title="This are the current request sent to the admin."></i></sup></h2>
			</div>
			<div class="filter-category things-notdone" id="pending1">
				<ul id="job-filters">
					<li class="active-filter" id="filter-all">All <span>(10)</span></li>
					<li id="filter-featured">Pending <span>(10)</span></li>
					<li id="filter-open">Confirmed <span>(10)</span></li>
					<li>Cancelled <span>(10)</span></li>
					<li>Deleted <span>(10)</span></li>
				</ul>
			</div><!-- End of filter tabs -->
			<div class="sortby filter-category" id="pending2">
				<div id="sort-drop" class="gone-now">
					<span>Sort by:</span>
					<select id="sort-filter">
						<optgroup>
							<option selected value="jobs.timestamp">Most Recent</option>
							<option value="jobs.salary">Job Salary</option>
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
							<!-- <th style="text-align: center;"></th> -->
							<th colspan="2" style="width: 220px;">Name</th>
							<th>User Type</th>
							<th>Department</th>
							<th>University No.</th>
							<th>Status</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody id="filter-job-container" class="chem_req_dash">
						<!-- Populate through ajax in main.js using class -->
					</tbody>
				</table>
			</div><!-- End of Table Design -->
			<div class="box cc-pagination-footer index_native" data-rows="10" id="pending4"></div>
		</div>
	</section>

<?php require_once APP_ROOT . '/views/admin/inc/footer.php'; ?>