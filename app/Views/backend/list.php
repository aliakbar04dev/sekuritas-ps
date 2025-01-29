<?= $this->extend('backend/layout') ?>
<?= $this->section('body') ?>
<div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__head kt-portlet__head--lg">
        <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
                <i class="kt-font-brand flaticon-squares"></i>
            </span>
            <h3 class="kt-portlet__head-title">
                <?= $title ?? 'No Title !' ?>                                     
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            
            <?= $actionbar ?? '' ?> 

        </div>
    </div>

    <div class="kt-portlet__body">
        <?php if(!empty($filterTable)): ?>
            
            <div class="accordion bg-white mt-2" id="accordion-example">
                <div class="accordion-item">
                <h2 class="accordion-header" id="heading-1">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-1" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-sort-descending-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <desc>Download more icon variants from https://tabler-icons.io/i/sort-descending-2</desc>
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <rect x="5" y="5" width="5" height="5" rx=".5"></rect>
                            <rect x="5" y="14" width="5" height="5" rx=".5"></rect>
                            <path d="M14 15l3 3l3 -3"></path>
                            <path d="M17 18v-12"></path>
                        </svg>Filter
                    </button>
                </h2>
                <div id="collapse-1" class="accordion-collapse collapse" data-bs-parent="#accordion-example" style="">
                    <div class="accordion-body pt-0">
                        <?= $filterTable ?? '' ?>
                    </div>
                </div>
            </div>
                
        </div>
        <?php endif; ?>
        <div class="table-responsive">
            <?= @$table ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>