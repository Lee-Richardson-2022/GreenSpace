<?php
include_once('charts.php');

function DelBtn(){ ?>
    <button class="delete-button">&times</button>
<?php } 

function ComplianceBar(){ ?>

<div class="draggable wide" draggable="false">
    <?php DelBtn() ?>
    <div id="compliance-bar" class="chart-container">
        <?php chartLegalComplianceBar('compliance-bar');
        ?>
    </div>
</div> 

<?php } 

function CompliancePie(){ ?>

    <div class="draggable" draggable="false">
        <?php DelBtn() ?>
        <div id="compliance-pie" class="chart-container">
            <?php chartLegalCompliancePie('compliance-pie');
            ?>
        </div>
    </div> 
    
    <?php } 

function Progress(){ ?>

<div class="draggable" draggable="false" id="progress">
    <?php DelBtn() ?>
    <p>Progress</p>
</div> 

<?php } 

function Bulb(){ ?>

    <div class="draggable" draggable="false">
        <?php DelBtn(); ?>
        <div id="bulb" class="chart-container">
            <?php chartOutstandingActions('bulb');
            ?>
        </div>
    </div> 

<?php } 

function DueActions(){ ?>

    <div class="draggable" draggable="false">
        <?php DelBtn() ?>
        <div id="due-actions" class="chart-container">
            <?php chartDueActions('due-actions');
            ?>
        </div>
    </div> 
    
    <?php } ?>