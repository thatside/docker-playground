<template>
    <v-form v-model="valid">
    <v-text-field
      label="Name"
      v-model="name"
      :rules="nameRules"
      :counter="10"
      required
    ></v-text-field>
    <v-text-field
      label="Content"
      v-model="content"
      :rules="contentRules"
      required
    ></v-text-field>
    <v-btn
      @click="submit"
      :disabled="!valid"
    >
      submit
    </v-btn>
    <v-btn @click="clear">clear</v-btn>
  </v-form>
</template>

<script>
import { mapActions } from 'vuex';
import { actions } from '@/store';

export default {
    data: () => ({
        valid: true,
        name: '',
        nameRules: [
            v => !!v || 'Name is required',
            v => v.length <= 10 || 'Name must be less than 10 characters'
        ],
        content: '',
        contentRules: [
            v => !!v || 'Content is required',
            v => v.length >= 25 || 'Content must be more than 25 characters'
        ],
    }),
    methods: {
        ...mapActions({
            addItem: actions.ADD_ITEM
        }),
        clear() {
            this.name = '';
            this.content = '';
        },
        submit() {
            this.addItem({name: this.name, content: this.content})
        }
    }
}
</script>

<style>

</style>
