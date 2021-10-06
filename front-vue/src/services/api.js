import axios from "axios";

const base_url = "http://localhost:8080/api/";

const base_header = {
  "Content-Type": "application/json",
  "Accept": "application/json",
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