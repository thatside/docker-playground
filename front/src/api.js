import axios from 'axios'
import { DateTime } from 'luxon'

export async function loadItems() {
    return axios.get('/');

    return new Promise((resolve, reject) => {
        setTimeout(() => {
          resolve([
              {name: 'Name 1', content: 'Some content', created: DateTime.local()},
              {name: 'Name 2', content: 'Some another content', created: DateTime.local().minus({hours: 5, minutes: 24})},
            ])
        }, 1000)
      })
}

export async function addItem(item) {
    return axios.post('/add', item);

    return new Promise((resolve, reject) => {
        setTimeout(() => {
          resolve(item)
        }, 1000)
      })
}