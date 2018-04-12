import Vue from 'vue'
import Vuex from 'vuex'

import {loadItems, addItem} from '@/api'

Vue.use(Vuex)

const mutations = {
  ITEMS_LOADED: 'itemsLoaded',
  ITEM_ADDED: 'itemAdded',
}

export const actions = {
  LOAD_ITEMS: 'loadItems',
  ADD_ITEM: 'addItem',
}

export default new Vuex.Store({
  state: {
    items: []
  },
  getters: {
    getItems(state) {
      return state.items
    }
  },
  mutations: {
    [mutations.ITEMS_LOADED](state, items) {
      state.items = items
    },
    [mutations.ITEM_ADDED](state, item) {
      state.items.push(item)
    }
  },
  actions: {
    async [actions.LOAD_ITEMS]({commit}) {
      const response = await loadItems();
      if (response.status === 200) {
        commit(mutations.ITEMS_LOADED, response.data)
      } else {
        console.log(response);
      }
    },
    async [actions.ADD_ITEM]({commit}, item) {
      const response = await addItem(item);

      if (response.status === 200) {
        commit(mutations.ITEM_ADDED, item)
      } else {
        console.log(response);
      }
    }
  }
})
