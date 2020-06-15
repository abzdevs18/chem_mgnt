<?php require_once APP_ROOT . '/views/admin/inc/head.php'; ?>


	<!-- <section class="tg-dash">
		<h1>Chemicals</h1>
	</section> -->
	<section class="main-tbl-container">
		<div class="tbl-wrap">
			<div class="content-head">
				<h2>Chemicals</h2>
			</div>
			<div class="filter-category">
				<ul id="job-filters">
					<li class="active-filter">All Chemicals <span>(10)</span></li>
				</ul>
			</div>
			<div class="sortby filter-category">
				<div id="sort-drop">
					<span>Sort by:</span>
					<select>
						<optgroup>
							<option selected>HIMEDIA</option>
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
			<div class="job-list-tables cc_tbl_pagination">
				<table>
					<thead>
						<tr>
							<!-- <th><input type="checkbox" name=""></th> -->
							<th colspan="2" style="width:240px;">Chemical Name</th>
							<th>Chemical Formula</th>
							<th>Mol. Wt.</th>
							<th>% Assay</th>
							<th>Quantity</th>
							<th>Expiry Date</th>
							<th>Brand</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody id="cc-list-chem">
						<?php foreach($data['chem'] AS $chem) : ?>
						<tr class="chemRows req_logs_">
							<td style="text-align: center;" class="ch-selection-item-action">
								<div class="ch-checkbox-item" data-checked></div>
								<!-- <input type="checkbox" name=""> -->
							</td>
							<td class="tittle-id ch-row-second" valign="middle">
								<h3><?=$chem->chemical_name?></h3>
								<span>Chemical ID: <?=$chem->chemId?></span>
							</td> 
							<td class="item-cat" valign="middle">
								<span><?php echo html_entity_decode($chem->chemical_formula);?></span>	
							</td>
							<td class="item-cat">
								<span><?=$chem->mol_wt?></span>	
							</td>
							<td>
								<span><?=$chem->assay?>%</span>
							</td>
							<td class="price-loc">								
								<h3><?=$chem->quantity?> g</h3>
								<div class="qStat"></div>
							</td>
							<td class="date-pub">								
								<h4 style="margin-bottom: 10px;"><?php echo date("M. d, Y", strtotime($chem->expiry_date)) ?></h4>
							</td>
							<td class="item-cat">
								<span><?=$chem->brand?></span>
							</td>
							<td class="action-btn">
								<span class="eye"><i class="fal fa-eye"></i></span>
								<span class="pencil"><i class="fal fa-pencil-alt"></i></span>
								<span class="trash"><i class="fal fa-trash"></i></span>
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