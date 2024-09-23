  <div class="text-dark bg-light shadow-sm d-flex align-items-center align-items-md-center align-items-lg-center justify-content-between sticky-top p-2">
      <?php
        if (isset($_SESSION['flash_message'])) {
            $alert_type = $_SESSION['flash_message']['type'];
            $message = $_SESSION['flash_message']['message'];
            echo "<div class='toast align-items-center text-bg-$alert_type border-0 position-fixed top-0 start-50 translate-middle-x mt-3' role='alert' aria-live='assertive' aria-atomic='true' id='liveToast' data-bs-delay=5000'>
            <div class='d-flex justify-content-center'>
                <div class='toast-body text-center'>
                    $message
                </div>
                <button type='button' class='btn-close btn-close-white me-2 m-auto' data-bs-dismiss='toast' aria-label='Close'></button>
            </div>
        </div>"; ?>
          <script>
              document.addEventListener('DOMContentLoaded', (event) => {

                  const toastElement = document.getElementById('liveToast');
                  const toast = new bootstrap.Toast(toastElement);
                  toast.show();

                  toastElement.addEventListener('hidden.bs.toast', () => {
                      // Clear the session message through AJAX
                      fetch('?action=clear_message', {
                              method: 'POST'
                          })
                          .then(response => response.text())
                          .then(data => {
                              // Handle any additional actions after clearing the session message
                          });
                  }); // Delay of 1.5 seconds before showing the toast
              });
          </script>
      <?php } ?>


      <a class="btn btn-link p-0"
          role="button"
          id="menu-toggle"
          href="#menu-toggle">
          <i class='bx bx-menu fs-2'></i>
      </a>
      <div
          class="d-flex align-items-center justify-content-end">
          <div class="dropdown">
              <button
                  class="bg-light border-0 p-0"
                  aria-expanded="false"
                  data-bs-toggle="dropdown"
                  type="button"
                  style="width: 2.5rem">
                  <img
                      class="border rounded-circle w-100"
                      src="assets/img/thumbnail_man_4140037_4890bcd9fb.webp" />
              </button>
              <div class="dropdown-menu border-0 shadow p-2">
                  <a class="dropdown-item rounded" href="#">
                      <div class="d-flex align-items-center justify-content-between">
                          <i class='bx bx-user me-2'></i>ข้อมูลส่วนตัว
                      </div>
                  </a>
                  <a class="dropdown-item rounded" href="index.html">
                      <div class="d-flex align-items-center justify-content-between">
                          <i class='bx bx-log-out-circle me-2'></i>ออกจากระบบ
                      </div>
              </div>
          </div>
          <a
              data-bs-toggle="tooltip"
              data-bss-tooltip=""
              class="mx-2 p-0"
              href="?s=menu&p=menu"
              title="กลับหน้าเมนู">
              <i class='bx bxs-dashboard fs-1'></i>
          </a>
      </div>
  </div>