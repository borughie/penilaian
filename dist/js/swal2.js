function simpan() {
    const Toast = Swal.mixin({
        toast: true,
        position: 'center',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })
      
      Toast.fire({
        icon: 'success',
        html: '<div class="drop-shadow-md text-transparent bg-clip-text bg-gradient-to-br from-blue-700 via-blue-800 to-gray-900 font-bold text-xl">Berhasil Menyimpan Data</div>'
      })
}

function gagalsimpan() {
    Swal.fire(
        'Gagal Menyimpan Data',
        'Gagal menyimpan data ke Database',
        'error'
    )
}

function update() {
    const Toast = Swal.mixin({
        toast: true,
        position: 'center',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })
      
      Toast.fire({
        icon: 'success',
        html: '<div class="drop-shadow-md text-transparent bg-clip-text bg-gradient-to-br from-blue-700 via-blue-800 to-gray-900 font-bold text-xl">Berhasil Memperbarui Data</div>'
      })
}

function gagalupdate() {
    Swal.fire(
        'Gagal Memperbarui Data',
        'Gagal diperbaui data ke Database',
        'error'
    )
}

function hapus() {
    const Toast = Swal.mixin({
        toast: true,
        position: 'center',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })
      
      Toast.fire({
        icon: 'success',
        html: '<div class="drop-shadow-md text-transparent bg-clip-text bg-gradient-to-br from-blue-700 via-blue-800 to-gray-900 font-bold text-xl">Berhasil Menghapus Data</div>'
      })
}

function gagalhapus() {
    Swal.fire(
        'Gagal Menghapus Data',
        'Gagal menghapus data dari Database',
        'error'
    )
}

function login() {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })
      
      Toast.fire({
        icon: 'success',
        html: '<div class="drop-shadow-md text-transparent bg-clip-text bg-gradient-to-br from-blue-700 via-blue-800 to-gray-900 font-bold text-xl">Login Berhasil</div>'
      })
}

function logout() {
  const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })
    
    Toast.fire({
      icon: 'success',
        html: '<div class="drop-shadow-md text-transparent bg-clip-text bg-gradient-to-br from-blue-700 via-blue-800 to-gray-900 font-bold text-xl">Logout Berhasil</div>'
    })
}

function password() {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })
      
      Toast.fire({
        icon: 'error',
        html: '<div class="drop-shadow-md text-transparent bg-clip-text bg-gradient-to-br from-blue-700 via-blue-800 to-gray-900 font-bold text-xl">Password yang anda masukan salah</div>'
      })
}

function username() {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })
      
      Toast.fire({
        icon: 'error',
        html: '<div class="drop-shadow-md text-transparent bg-clip-text bg-gradient-to-br from-blue-700 via-blue-800 to-gray-900 font-bold text-xl">NIP / NIS Tidak Ditemukan</div>'
      })
}

function daftar() {
  const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })
    
    Toast.fire({
      icon: 'success',
      html: '<div class="drop-shadow-md text-transparent bg-clip-text bg-gradient-to-br from-blue-700 via-blue-800 to-gray-900 font-bold text-xl">Pendaftaran Berhasil</div>'
    })
}

function gagaldaftar() {
  const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })
    
    Toast.fire({
      icon: 'error',
      html: '<div class="drop-shadow-md text-transparent bg-clip-text bg-gradient-to-br from-blue-700 via-blue-800 to-gray-900 font-bold text-xl">Pendaftaran Gagal</div>'
    })
}

function emailada() {
  const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })
    
    Toast.fire({
      icon: 'error',
      html: '<div class="drop-shadow-md text-transparent bg-clip-text bg-gradient-to-br from-blue-700 via-blue-800 to-gray-900 font-bold text-xl">Email Telah Digunakan</div>'
    })
}

function userada() {
  const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })
    
    Toast.fire({
      icon: 'error',
      html: '<div class="drop-shadow-md text-transparent bg-clip-text bg-gradient-to-br from-blue-700 via-blue-800 to-gray-900 font-bold text-xl">Username Telah Digunakan</div>'
    })
}

function terlalubesar() {
  const Toast = Swal.mixin({
      toast: true,
      position: 'center',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })
    
    Toast.fire({
      icon: 'success',
      html: '<div class="drop-shadow-md text-transparent bg-clip-text bg-gradient-to-br from-blue-700 via-blue-800 to-gray-900 font-bold text-xl">Ukuran Foto Terlalu Besar</div>'
    })
}
function terlalubesar() {
  const Toast = Swal.mixin({
      toast: true,
      position: 'center',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })
    
    Toast.fire({
      icon: 'success',
      html: '<div class="drop-shadow-md text-transparent bg-clip-text bg-gradient-to-br from-blue-700 via-blue-800 to-gray-900 font-bold text-xl">Ekstensi file tidak diperbolehkan</div>'
    })
}

function nissudahada() {
  const Toast = Swal.mixin({
      toast: true,
      position: 'center',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })
    
    Toast.fire({
      icon: 'success',
      html: '<div class="drop-shadow-md text-transparent bg-clip-text bg-gradient-to-br from-blue-700 via-blue-800 to-gray-900 font-bold text-xl">Nis Sudah Digunakan</div>'
    })
}

function logindulu() {
  let timerInterval
    Swal.fire({
      icon: 'warning',
      html: '<div class="drop-shadow-md text-transparent bg-clip-text bg-gradient-to-br from-blue-700 via-blue-800 to-gray-900 font-bold text-3xl">Anda Belum Login</div> <div class="text-gray-700 font-semibold">Silahkan Login Terlebih Dahulu.</div>',
      timer: 2000,
      timerProgressBar: true,
      didOpen: () => {
        Swal.showLoading()
        const b = Swal.getHtmlContainer().querySelector('b')
        timerInterval = setInterval(() => {
          b.textContent = Swal.getTimerLeft()
        }, 100)
      },
      willClose: () => {
        clearInterval(timerInterval)
      }
    }).then((result) => {
      if (result.dismiss === Swal.DismissReason.timer) {
        document.location = './login.php';
      }
    });
}
       
      