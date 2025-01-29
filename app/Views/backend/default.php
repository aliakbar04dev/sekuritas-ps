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
        <?= $this->renderSection('content') ?>
    </div>
</div>

<?= $this->endSection() ?>