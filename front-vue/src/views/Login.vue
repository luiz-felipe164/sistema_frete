<template>
  <v-app>
    <v-main>
      <v-container fluid fill-height>
        <v-layout align-center justify-center>
          <v-flex xs12 sm8 md4>
            <v-card class="elevation-12">
              <v-toolbar dark color="primary">
                <v-toolbar-title>Sistema de Fretes</v-toolbar-title>
              </v-toolbar>
              <v-card-text>
                <form ref="form" @submit.prevent="login()">
                  <v-text-field
                    v-model="email"
                    name="email"
                    label="Email"
                    type="text"
                    placeholder="email"
                    required
                  ></v-text-field>

                  <v-text-field
                    v-model="password"
                    name="password"
                    label="Password"
                    type="password"
                    placeholder="password"
                    required
                  ></v-text-field>
                  <v-progress-circular
                    v-if="loading"
                    indeterminate
                    color="primary"
                  ></v-progress-circular>
                  <v-btn
                    v-if="!loading"
                    type="submit"
                    class="mt-4"
                    color="primary"
                    value="log in"
                    >Login</v-btn
                  >
                  <br>
                  <Alert v-if="error.alert" :message="error.message"/>
                </form>
              </v-card-text>
            </v-card>
          </v-flex>
        </v-layout>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import { login } from "../services/api";
import Alert from '../components/Alert.vue';

export default {
  components: { Alert },
  name: "Login",
  data() {
    return {
      email: "",
      password: "",
      loading: false,
      error: {
        message: '',
        alert: false
      },
    };
  },
  methods: {
    async login() {
      this.loading = true;
      this.error.alert = false
      
      const response = await login(this.email, this.password);
      this.loading = false;

      if (response.status === 401) {
        this.error.message = 'Usuário ou Senha Invalidos'
        this.error.alert = true;
        return;
      }

      console.log(response)
      localStorage.setItem('_token_frete', response.access_token)
      this.$router.replace('fretes')
    },
  },
};
</script>