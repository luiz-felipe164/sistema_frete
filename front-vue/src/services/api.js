import axios from "axios";

const base_url = "http://localhost:8081/api/";

const base_header = {
  headers: {
    "Content-Type": "application/json",
    "Accept": "application/json",
  }
}

export async function login(email, password) {
  try {
    const response = await axios.post(`${base_url}login`,
      { email: email, password: password },
      base_header
    );
    return response.data;
  } catch (error) {
    return error.response;
  }
}

export async function allFretes(){
  try {
    const header = {
      headers: {
        ...base_header,
        "Authorization": `Bearer ${getToken()}`
      },
    };

    const response = await axios.get(`${base_url}shipping`,
      header
    );
    return response.data;
  } catch (error) {
    console.log(error)
    return error.response;
  }
}

export function getToken(){
  return localStorage.getItem('_token_frete')
}