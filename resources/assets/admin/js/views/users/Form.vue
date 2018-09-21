<template>
    <form @submit.prevent="onSubmit">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="name">E-mail:</label>
                    <input type="text" class="form-control" id="email" v-model="item.email"
                           placeholder="E-mail"/>
                </div>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" v-model="item.name"
                           placeholder="Name"/>
                </div>
                <div class="form-group" v-if="!item.id">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" v-model="item.password"
                           placeholder="Password"/>
                </div>
                <div class="form-group">
                    <label for="role">Role:</label>
                    <select v-model="item.role"  class="form-control">
                        <option :value="null">Choose from roles</option>
                        <option v-for="role in roles" :value="role.id">{{role.name}}</option>
                    </select>

                </div>
                <div class="form-group">
                    <label for="country">Country:</label>
                    <multiselect v-model="item.country" :options="countries" :searchable="true"
                                 :show-labels="false" placeholder="Choose country" :multiple="false"
                                 label="name" track-by="id"></multiselect>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-primary" v-if="item.id">Edit</button>
                <button class="btn btn-success" v-else>Create</button>
            </div>
        </div>
    </form>
</template>

<script>
    import CrudForm from '../../components/Crud/Form'

    export default {
        name: 'users-form',
        mixins: [CrudForm],
        data() {
            return {
                countries: [],
                roles: []
            }
        },
        mounted() {
            this.getCountries();
            this.getRoles();
        },
        methods: {
            getCountries() {
                return new Promise((resolve) => {
                        this.$http.get(this.store.apiUrl + 'countries/', {params: {paginate: false}}).then((response) => {
                            this.countries = response.data;
                            resolve();
                        }, () => {
                            this.$swal("Something went wrong. Try again!", '', "error");
                        });
                    }
                );
            },
            getRoles() {
                return new Promise((resolve) => {
                        this.$http.get(this.store.apiUrl + this.module + '/roles').then((response) => {
                            this.roles = response.data;
                            resolve();
                        }, () => {
                            this.$swal("Something went wrong. Try again!", '', "error");
                        });
                    }
                );
            },
        }
    }
</script>
