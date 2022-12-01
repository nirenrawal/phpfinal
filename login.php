<?php include("header.php");?>



    <section class="pt-5">
        <div class="row">
            <div class="container">
                <div class="jumbotron">
                    <h1 class="display-4 text-center">Log In</h1>
                    <p class="lead">Please Enter your email address and password.</p>
                    <hr class="my-4">
                    


                    <form>
                        

                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                          </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input name="password" type="password" class="form-control" id="password" placeholder="Enter Password">
                          </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                  </div>
            </div>
        </div>
    </section>

   

    <?php include("footer.php");?>