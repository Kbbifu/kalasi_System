<?php 
$edit_data		=	$this->db->get_where('invoice' , array('invoice_id' => $param2) )->result_array();
?>

<div class="tab-pane box active" id="edit" style="padding: 5px">
    <div class="box-content">
        <?php foreach($edit_data as $row):?>
        <?php echo form_open(base_url() . 'index.php?teacher/invoice/do_update/'.$row['invoice_id'], array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo ('Elève');?></label>
                    <div class="col-sm-5">
                        <select name="student_id" class="form-control" style="width:400px;" >
                            <?php 
                            $this->db->order_by('class_id','asc');
                            $students = $this->db->get('student')->result_array();
                            foreach($students as $row2):
                            ?>
                                <option value="<?php echo $row2['student_id'];?>"
                                    <?php if($row['student_id']==$row2['student_id'])echo 'selected';?>>
                                    classe <?php echo $this->crud_model->get_class_name($row2['class_id']);?> -
                                    <?php echo $row2['name'];?>
                                </option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo ('Libellé');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="title" value="<?php echo $row['title'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo ('Description');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="description" value="<?php echo $row['description'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo ('Montant Total');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="amount" value="<?php echo $row['amount'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo ('Status');?></label>
                    <div class="col-sm-5">
                        <select name="status" class="form-control">
                            <option value="paid" <?php if($row['status']=='paid')echo 'selected';?>><?php echo ('Payé');?></option>
                            <option value="unpaid" <?php if($row['status']=='unpaid')echo 'selected';?>><?php echo ('Non payé');?></option>
                            <option value="incomplete" <?php if($row['status']=='incomplete')echo 'selected';?>><?php echo ('Incomplete');?></option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo ('Date');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="datepicker form-control" name="date" 
                            value="<?php echo date('m/d/Y', $row['creation_timestamp']);?>"/>
                    </div>

                </div>
                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-5">
                      <button type="submit" class="btn btn-info"><?php echo ('Modifier recu');?></button>
                  </div>
                </div>
        </form>
        <?php endforeach;?>
    </div>
</div>