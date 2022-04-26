<!-- START MODALS -->

<!-- BOOKS MODAL -->

<div class="modal fade" id="book" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ADD BOOKS</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            <div class="modal-body">
                    <form method="post" action="register.php" enctype="multipart/form-data" role="form">
                        
                        <div class="form-group">
                            <input type="text" autofocus name="book_title" class="form-control" placeholder=" -- Book Title --" required>
                        </div>

                        <div class="form-group">
                            <input type="text" name="author" class="form-control" placeholder=" -- Author --" required>
                        </div>

                        <div class="form-group">
                            <input type="text" name="publisher" class="form-control" placeholder=" -- Publisher --" required>
                        </div>

                        <div class="form-group">
                            <textarea name="description" id="description" class="form-control" cols="5" rows="4" placeholder=" -- Book Description -- " required></textarea>
                        </div>

                        <div class="form-group">
                            <div class="form-label"> Image Cover </div>
                            <input type="file" name="image_file" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <div class="form-label"> File  </div>
                            <input type="file" name="document_file" class="form-control" required>
                        </div>

                    </div>
                        
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <input type="submit" class="btn btn-info" name="add_book" value="Save" />
                    </div>
            </form>
        </div>
    </div>
</div>

<!-- END BOOK -->

<!-- BORROW MODAL -->

<div class="modal fade" id="borrow" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ADD BORROWERS</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            <div class="modal-body">
                    <form method="post" action="register.php" role="form">
                        
                    <div class="form-group">
                        <select class="form-control" name="book_id" required>
                            <option value="Null"> -- Books -- </option>
                            <?php
                                $q1 = "SELECT * FROM books";
                                $stmt = $db->prepare($q1);
                                $stmt->execute();
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<option value='" . $row['b_id'] . "'>" . $row['book_title'] . "</option>";};
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <select class="form-control" name="userid" required>
                            <option value="Null"> -- Users -- </option>
                            <?php
                                $q1 = "SELECT * FROM users";
                                $stmt = $db->prepare($q1);
                                $stmt->execute();
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<option value='" . $row['u_id'] . "'>" . $row['firstname'] . " " . $row['surname'] . " " . " ( " . $row['id_number'] . " ) " . "</option>";};
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        Date Borrowed :  <input type="date" name="date_borrow" class="form-control" required>
                    </div>

                    <div class="form-group">
                        Date for Submission :  <input type="date" name="date_submit" class="form-control" required>
                    </div>

                </div>
                        
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-info" name="add_borrow" value="Save" />
                </div>
            </form>
        </div>
    </div>
</div>

<!-- END BOOK -->

<!-- USERS MODAL -->

<div class="modal fade" id="user" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ADD USERS</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        <div class="modal-body">
                <form method="post" action="register.php" role="form">
                    
                    <div class="form-group">
                        <input type="text" autofocus name="firstname" class="form-control" placeholder=" Firstname " required>
                    </div>

                    <div class="form-group">
                        <input type="text" name="surname" class="form-control" placeholder=" Surname " required>
                    </div>

                    <div class="form-group">
                        <input type="text" name="id_number" class="form-control" placeholder=" ID Number " required>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-info" name="add_user" value="Save" />
                </div>
            </form>
        </div>
    </div>
</div>

<!-- END USERS -->

<!-- LOGOUT MODAL -->

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-footer text-white">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
        <a class="btn btn-info" id="submit" href="../logout.php">Yes</a>
      </div>
    </div>
  </div>
</div>

<!-- END LOGOUT -->

<!-- END MODALS -->