
let login = require('./components/auth/login.vue').default;
let register = require('./components/auth/register.vue').default;
let forget = require('./components/auth/forget.vue').default;
let logout = require('./components/auth/logout.vue').default;

let home = require('./components/home.vue').default;

let profile = require('./components/profile/index.vue').default;
let edit_profile = require('./components/profile/edit.vue').default;

let property = require('./components/property/index.vue').default;

let apartment = require('./components/apartment/index.vue').default;

let tenant = require('./components/tenant/index.vue').default;

let frontpage = require('./components/index.vue').default;

let landlord = require('./components/landlord/index.vue').default;
let landlord_profile = require('./components/landlord/profile.vue').default;
let landlord_properties = require('./components/landlord/properties.vue').default;
let landlord_apartments = require('./components/landlord/apartments.vue').default;
let landlord_tenants = require('./components/landlord/tenants.vue').default;
let landlord_tenant = require('./components/landlord/tenant.vue').default;

let service = require('./components/service/index.vue').default;

let services = require('./components/services/index.vue').default;
let monthly_services = require('./components/services/monthly.vue').default;
let one_off_services = require('./components/services/one_off.vue').default;

let debtors = require('./components/debtors/index.vue').default;

let template = require('./components/template.vue').default;

export const routes = [
    { path: '/login', component: login, name: 'login' },
    { path: '/register', component: register, name: 'register' },
    { path: '/forget', component: forget, name: 'forget' },
    { path: '/logout', component: logout, name: 'logout' },
    
    { path: '/home', component: home, name: 'home' },

    { path: '/profile', component: profile, name: 'profile' },
    { path: '/edit-profile', component: edit_profile, name: 'edit-profile' },

    { path: '/property', component: property, name: 'property' },

    { path: '/apartment', component: apartment, name: 'apartment' },

    { path: '/tenant', component: tenant, name: 'tenant' },

    { path: '/', component: frontpage, name: 'frontpage' },

    { path: '/landlord', component: landlord, name: 'landlord' },
    { path: '/landlord-profile/:id', component: landlord_profile, name: 'landlord-profile' },
    { path: '/landlord-properties/:id', component: landlord_properties, name: 'landlord-properties' },
    { path: '/landlord-apartments/:id', component: landlord_apartments, name: 'landlord-apartments' },
    { path: '/landlord-tenants/:id', component: landlord_tenants, name: 'landlord-tenants' },
    { path: '/landlord-tenant/:id', component: landlord_tenant, name: 'landlord-tenant' },

    { path: '/service', component: service, name: 'service' },

    { path: '/services', component: services, name: 'services' },
    { path: '/monthly-services/:id', component: monthly_services, name: 'monthly-services' },
    { path: '/one-off-services/:id', component: one_off_services, name: 'one-off-services' },

    { path: '/debtors', component: debtors, name: 'debtors' },

    { path: '/template', component: template, name: 'template'}
  ]