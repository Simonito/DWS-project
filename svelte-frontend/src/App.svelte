<script>
  let currentForm = 'login-form';

  function showForm(formId) {
    currentForm = formId;
  }
	showForm('login-form');
</script>

<style>
  /* basic styling */
  /* body {
    font-family: Arial, Helvetica, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f2f2f2;
  } */

  /* form styling */
  .form-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
  }

  .form {
    display: none;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background-color: white;
    padding: 40px;
    border-radius: 8px;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
  }

  .form h2 {
    font-size: 24px;
    margin-bottom: 20px;
  }

  .form input[type="text"],
  .form input[type="password"] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    box-sizing: border-box;
    background-color: #f2f2f2;
  }

  .form input[type="submit"] {
    background-color: #4caf50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  .form input[type="submit"]:hover {
    background-color: #45a049;
  }

  .form p {
    margin-top: 20px;
  }

  /* error message styling */
  .error {
    color: red;
    font-weight: bold;
    margin-bottom: 20px;
  }
</style>

<div class="form-container">
  <form class="form" id="login-form" style={currentForm === 'login-form' ? 'display: flex' : 'display: none'}>
    <h2>Login</h2>
    <div id="login-error" class="error"></div>
    <input type="text" placeholder="Username" name="username" required />
    <input type="password" placeholder="Password" name="password" required />
    <input type="submit" value="Login" />
    <p>Don't have an account? <a href="#0" on:click={() => showForm('register-form')}>Register</a></p>
  </form>
  <form class="form" id="register-form" style={currentForm === 'register-form' ? 'display: flex' : 'display: none'}>
    <h2>Register</h2>
    <div id="register-error" class="error"></div>
    <input type="text" placeholder="Username" name="username" required />
    <input type="password" placeholder="Password" name="password" required />
    <input type="submit" value="Register" />
    <p>Already have an account? <a href="#0" on:click={() => showForm('login-form')}>Login</a></p>
  </form>
</div>
