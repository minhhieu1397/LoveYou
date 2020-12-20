# Khái Niệm
### Các matchers
- .toBe(): Giống như phép so sánh.
- .toEqual(): So sánh một đối tượng, kiểm tra các trường của đối tượng đấy.
```javascript
		test('two plus two is four', () => {
			expect(2 + 2).toBe(4);
		});

		test('object assignment', () => {
			const data = {one: 1};
			data['two'] = 2;
			expect(data).toEqual({one: 1, two: 2});
		});
```
### Trạng thái
- .toBeNull: so sánh với giá trị null.
- .toBeUndefined: so sánh với giá trị undefined.
- .toBeDefined: là hàm cho kết quả ngược lại toBeUndefined.
- .toBeTruthy: so sánh với giá trị true.
- .toBeFalsy: so sánh với giá trị false.
```javascript
		test('null', () => {
			const n = null;
			expect(n).toBeNull();
			expect(n).toBeDefined();
			expect(n).not.toBeUndefined();
			expect(n).not.toBeTruthy();
			expect(n).toBeFalsy();
		});

		test('zero', () => {
			const z = 0;
			expect(z).not.toBeNull();
			expect(z).toBeDefined();
			expect(z).not.toBeUndefined();
			expect(z).not.toBeTruthy();
			expect(z).toBeFalsy();
		});
```
### Number
- .toBeGreaterThan : So sánh hơn
- ..toBeLessThan: So sánh nhỏ hơn
```javascript
		test('two plus two', () => {
			const value = 2 + 2;
			expect(value).toBeGreaterThan(3);
			expect(value).toBeGreaterThanOrEqual(3.5);
			expect(value).toBeLessThan(5);
			expect(value).toBeLessThanOrEqual(4.5);

			// toBe and toEqual are equivalent for numbers
			expect(value).toBe(4);
			expect(value).toEqual(4);
		});
```
### String
- .toMatch: So sánh chuỗi
```javascript
		test('there is no I in team', () => {
			expect('team').not.toMatch(/I/);
		});

		test('but there is a "stop" in Christoph', () => {
			expect('Christoph').toMatch(/stop/);
		});
```		
### Array
- .toContain: Kiểm tra giá trị có tồn tại trong mảng.
```javascript
		const shoppingList = [
			'diapers',
			'kleenex', 
			'trash bags', 
			'paper towels', 
			'beer',
		];

		test('the shopping list has beer on it', () => {
			expect(shoppingList).toContain('beer');
		});
```
### Exceptions
- .toThrow: Kiểm tra lỗi
## Unit tests
.................
### Mock.
Khi thực hiện test 1 đoạn code, mà đoạn code đấy cần kết quả của 1 function khác. Thay vì chúng ta test thêm function đấy ta có thể dùng mock để đặt giá trị kết quả của function khác đó làm đầu vào cho function ta cần test. Ví Dụ
```javascript
		async addJsonLdShop({ commit, state, rootState }) {
		    await axios
		        .get('api/add-json-shop', {
		            headers: {
		                Authorization: `Bearer ${rootState.auth.token}`
		            }
		        })
		        .then(response => {
		            if (response.data.result == 'successfully') {
		                commit('SET_STATUS', response.data.result)
		                commit('SET_MESSAGE', response.data.message)
		                commit('checkJsonLd/SET_STATUS_SHOP', 'true', { root: true })
		                setTimeout(() => commit('SET_STATUS',null), 4000)
		            }
		        })
		        .catch(error => {
		            if (error.response) {
		                if (error.response.status === 401) {
		                    commit('SET_STATUS', 'Your session has expired, please log in again')
		                    this.$router.push({ path: '/' })
		                } else if (error.response.status === 500) {
		                    commit('SET_STATUS', 'Server is under maintenance')
		                    this.$router.push({ path: '/' })
		                } else {
		                    commit('SET_STATUS', 'Something Error')
		                    this.$router.push({ path: '/' })
		                }
		            }
		        })
		},
```
```javascript
		import addJsonLd from "~/store/modules/addJsonLd"
		import axios from '~/plugins/axios'
		import MockAdapter from 'axios-mock-adapter'
		const mock = new MockAdapter(axios)

		describe("add json ld actions", () => {
		  it('check axios call add json shop', async () => {
		    const commit = jest.fn()
		    const state = jest.fn()
		    const rootState = {
		      auth: {
		        token: 'aaaa'
		      }
		    }
		    const response = {}

		    mock
		      .onGet("api/add-json-shop", {
		        headers: {
		          Authorization: `Bearer ${rootState.auth.token}`
		        }
		      })
		      .reply(200, {
		        result: 'successfully',
		        message: 'abcxyz'
		      })
		    await addJsonLd.actions.addJsonLdShop({ commit, state ,rootState })
		    await axios.get('api/add-json-shop')
		      .then((response) => {
		        // console.log(response.data)
		      expect(response.data).toEqual({result: 'successfully', message: 'abcxyz'})
		      expect(commit).toHaveBeenCalledWith("SET_STATUS", 'successfully')
		      expect(commit).toHaveBeenCalledWith("SET_MESSAGE", 'abcxyz')
		      expect(commit).toHaveBeenCalledWith("checkJsonLd/SET_STATUS_SHOP", 'true', {root: true})
		      expect(commit).toHaveBeenCalledTimes(3)
		      setTimeout(() => {
		        expect(commit).toHaveBeenCalledWith("SET_STATUS", null)
		      }, 4000)
		    })
		  })
		})
````
### npm run test -- --coverage // xem có chạy het 100% file đó k
### SnapShoot
2 thư viện: react-test-renderer,enzyme
File Hello.Vue

		<template>
		 <div class="hello">
		   <h1>{{ message }} {{ name }}</h1>
		 </div>
		</template>

		<script>
		 export default {
		   name: 'hello',
		   props: {
		     name: String
		   },
		   data () {
		     return {
		       message: 'Welcome'
		     }
		   }
		 }
		</script>

File test
		it('should contain default message', () => {
		 // when
		 const wrapper = shallow(Hello);

		 // then
		 expect(wrapper).toMatchSnapshot()
		});

		it('fetches successfully data from an API', async () => {
        jest.mock('axios', () => ({
        get: jest.fn().mockResolvedValue({ data: {
            hits: [
              {
                objectID: '1',
                title: 'a',
              },
              {
                objectID: '2',
                title: 'b',
              },
            ],
          }})
        }))

        test('mock axios.get', async () => {
        const response = await axios.get('https://jsonplaceholder.typicode.com/posts/1');

        expect(response.data).toEqual({ foo: 'bar' });
        })
    }