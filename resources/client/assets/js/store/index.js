import Vue from 'vue'
import Vuex from 'vuex'
import Alert from './modules/alert'
import ChangePassword from './modules/change_password'
import Rules from './modules/rules'
import SurveysIndex from './modules/Surveys'
import SurveysSingle from './modules/Surveys/single'
import QuestionnairesIndex from './modules/Questionnaires'
import QuestionnairesSingle from './modules/Questionnaires/single'
import InstitutionsIndex from './modules/Institutions'
import InstitutionsSingle from './modules/Institutions/single'
import GroupsIndex from './modules/Groups'
import GroupsSingle from './modules/Groups/single'
import CategoriesIndex from './modules/Categories'
import CategoriesSingle from './modules/Categories/single'
import UsersIndex from './modules/Users'
import UsersSingle from './modules/Users/single'
import RolesIndex from './modules/Roles'
import RolesSingle from './modules/Roles/single'
import PermissionsIndex from './modules/Permissions'
import PermissionsSingle from './modules/Permissions/single'

Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
    modules: {
        Alert,
        ChangePassword,
        Rules,
        SurveysIndex,
        SurveysSingle,
        QuestionnairesIndex,
        QuestionnairesSingle,
        InstitutionsIndex,
        InstitutionsSingle,
        GroupsIndex,
        GroupsSingle,
        CategoriesIndex,
        CategoriesSingle,
        UsersIndex,
        UsersSingle,
        RolesIndex,
        RolesSingle,
        PermissionsIndex,
        PermissionsSingle,
    },
    strict: debug,
})