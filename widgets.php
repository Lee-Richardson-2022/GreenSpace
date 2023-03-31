<?php
include_once('charts.php');

function ComplianceBar(){ ?>

<div class="item wide">
    <div id="compliance-bar" class="item-content">
        <?php chartLegalComplianceBar('compliance-bar');
        ?>
    </div>
</div> 

<?php } 

function CompliancePie(){ ?>

    <div class="item">
        <div id="compliance-pie" class="item-content">
            <?php chartLegalCompliancePie('compliance-pie');
            ?>
        </div>
    </div> 

<?php }

function Bulb(){ ?>

    <div class="item">
        <div id="bulb" class="item-content">
            <?php chartOutstandingActions('bulb');
            ?>
        </div>
    </div> 

<?php } 

function DueActions(){ ?>

    <div class="item">
        <div id="due-actions" class="item-content">
            <?php chartDueActions('due-actions');
            ?>
        </div>
    </div> 
    
<?php } ?>