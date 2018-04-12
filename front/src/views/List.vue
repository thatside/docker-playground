<template>
    <v-layout row wrap>
        <v-flex xs12>
            <v-card v-for="(item, idx) in items" :key="idx" dark color="primary" class="mb-3">
                <v-card-title class="px-3">{{item.name}}</v-card-title>
                <v-card-text class="px-0">{{item.content}}</v-card-text>
            </v-card>
        </v-flex>
    </v-layout>
</template>

<script>
import { mapGetters } from 'vuex'
import { actions } from '@/store'

export default {
    mounted() {

    },
    methods: {
        ...mapGetters([
            'getItems'
        ])
    },
    computed: {
        items() {
            return this.getItems();
        }
    }
}
</script>

<style>

</style>
