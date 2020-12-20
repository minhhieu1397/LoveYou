import { mount } from '@vue/test-utils'
import Counter from '@/Counter.vue'
import Profile from '@/profile.vue'
import MockAdapter from 'axios-mock-adapter'
import axios from 'axios'

const mock = new MockAdapter(axios)

describe('Hello.vue', () => {

    it('increments counter', () => {
        const wrapper = mount(Counter);

        expect(wrapper.vm.counter).toBe(0);

        wrapper.find('[jest="increment-button"]').trigger('click')

        expect(wrapper.vm.counter).toBe(1);
    })

    it('check axios call add json shop', async () => {
        mock
        .onGet("api/tours")
        .reply(200, {
            tour: [
                {
                    tour_name: '1',
                    vehicle: 'a',
                    departure: '1',
                    day_night: 'a',
                    price: 'a',
                    note: 'a',
                }
            ]
        })
        console.warn( await "/api/tour")
        await axios.get("api/tours")
        .then((response) => {
            const wrapper = mount(Profile);
            wrapper.find('[jest="getAll-button"]').trigger('click');
            wrapper.vm.tour = response.data;
            expect(wrapper.vm.tour).toEqual({tour: [{tour_name: '1', vehicle: 'a', departure: '1', day_night: 'a', price: 'a', note: 'a'}]  });
        })
    })
    it('snapshhot', () => {
        const wrapper = mount(Counter);

        expect(wrapper.html()).toMatchSnapshot()

        // wrapper.find('[jest="increment-button"]').trigger('click')

        // expect(wrapper.html()).toMatchSnapshot()
        
    })
})


