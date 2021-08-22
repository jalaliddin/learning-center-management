<template>
    <div class="card">
        <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
                <img :src="'/uploads/avatars/'+ students.avatar" alt="Admin" class="rounded-circle" width="150">
                <div class="mt-3">
                    <h4>{{students.name}} {{students.surname}}</h4>
                    <p class="text-muted font-size-sm">{{students.phone}}</p>
                    <p class="text-secondary mb-1">{{students.created_at}}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            // users: {},
        }
    },
    computed: {
      students() {
          return this.$store.state.students
      }
    },
    mounted() {
        this.$store.dispatch("getStaticStudents");
    },
    methods: {
    }
}
</script>
