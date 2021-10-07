export default {
  auth(to, from, next) {
    const token = localStorage.getItem('_token_frete')

    if (!token) {
      next('login')
    }

    next()
  }
}