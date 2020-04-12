<?php require_once APP_ROOT . '/views/admin/inc/head.php'; ?>


	<!-- <section class="tg-dash">
		<h1>Pending Request</h1>
	</section> -->
	<section class="main-tbl-container">
		<div class="tbl-wrap">
			<div class="content-head">
				<h2>Pending Request <sup><i class="fal fa-question-circle" style="font-size:12px;" title="This are the current request sent to the admin."></i></sup></h2>
			</div>
			<div class="filter-category">
				<ul id="job-filters">
					<li class="active-filter" id="filter-all">All <span>(10)</span></li>
					<li id="filter-featured">Pending <span>(10)</span></li>
					<li id="filter-open">Confirmed <span>(10)</span></li>
					<li>Cancelled <span>(10)</span></li>
					<li>Deleted <span>(10)</span></li>
				</ul>
			</div><!-- End of filter tabs -->
			<div class="sortby filter-category">
				<div id="sort-drop">
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
			<div class="job-list-tables">
				<table>
					<thead>
						<tr>
							<!-- <th style="text-align: center;"></th> -->
							<th colspan="2" style="width: 220px;">Name</th>
							<th>User Type</th>
							<th>Department</th>
							<th>Student No.</th>
							<th>Status</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody id="filter-job-container">
						<!-- if job is close add row with class name "sold" -->
						<?php for($i = 0; $i < 5; $i++) : ?>
						<tr class="req_logs_" data-rowId="<?php echo '#contentId'.$i;?>">
							<td style="text-align: center;" class="ch-selection-item-action">
								<div class="ch-checkbox-item" data-checked></div>
								<!-- <input type="checkbox" name=""> -->
							</td>
							<td class="ch-row-second">
								<div class="request_icon_wrapper">
									<div class="req_icon">
										<span>C</span>
									</div>
									<div class="cc-name" style="margin:5px;margin-top:0px;">
										<h3>Clint Anthony Abueva</h3>
										<time datetime="2017-08-08">01 Day Ago</time>
									</div>
								</div>
							</td>
							<td class="tittle-id">
								<h3>Student</h3>
							</td>
							<td class="tittle-id">
								<h3>Department</h3>
							</td>
							<td>
								<span>02131011</span>
							</td>
							<td>
								<span class="ch-request-status">Pending</span>
							</td>
							<td class="action-btn">
								<span class="eye" data-jId="<?=$job->jId;?>"><i class="fal fa-eye"></i></span>
								<span class="pencil" data-jId="<?=$job->jId;?>"><i class="fal fa-pencil-alt"></i></span>
								<span class="trash" data-jId="<?=$job->jId;?>"><i class="fal fa-trash"></i></span>
							</td>
						</tr>
						<tr id="<?='contentId'.$i?>" class="containerCollapse collapse">
							<td colspan="7">
								<div class="offices-msgs">
								</div>
								<div class="alerts-notif">
									<div class="alert-content no-fixed-height">
										<div class="content-head">
											<h2>Disposal Guideles</h2>
										</div>
										<div class="changepass-holder" style="display:flex;flex-direction:column;">
											<div class="form-group">
												<!-- <input type="text" name="emFirst" placeholder="First Name*" class="form-control"> -->
												<textarea name="note" id="note" cols="30" rows="40" class="form-control"
													style="resize: vertical;height: 200px;"></textarea>
												<label for="note">Guidelines</label>
											</div>
										</div>
										<div class="request_icon_wrapper guide_icons caution_note_label" style="display:none;">
											<div class="req_icon warning_icon">
												<!-- <span>IV</span> -->
												<img id="precaution_icon" src="/img/icons/safety/precaution.png" alt=""
													style="width:100%;margin:10px;">
											</div>
											<div class="m_notif_content warning_content">
												<b id="precaution_label">Proceed with Caution</b>
												<!-- <b>Warning</b> -->
												<h3 id="precaution_content">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptas
													commodi incidunt similique corporis recusandae esse veritatis quam adipisci, molestias
													cupiditate earum placeat mollitia excepturi, error quidem odio fugiat quaerat quo.</h3>
												<!-- <time datetime="2017-08-08">01 Day Ago</time> -->
											</div>
										</div>
									</div>
								</div>
							</td>
						</tr>
						<?php endfor; ?>
					</tbody>
				</table>
			</div><!-- End of Table Design -->
		</div>
	</section>

<?php require_once APP_ROOT . '/views/admin/inc/footer.php'; ?>