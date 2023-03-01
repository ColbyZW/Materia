/**
 * @jest-environment jsdom
 */

import React from 'react'
import { QueryClient, QueryClientProvider } from 'react-query'
import { render, screen, cleanup, fireEvent, waitFor } from '@testing-library/react'
import '@testing-library/jest-dom'

import widgets from '../__test__/mockapi/admin_widgets_get.json'

import UserAdminPage from './user-admin-page'
import UserAdminInstanceAvailable from './user-admin-instance-available'
import UserAdminSearch from './user-admin-search'
import UserAdminInstancePlayed from './user-admin-instance-played'
import UserAdminSelected from './user-admin-selected'

import * as api from '../util/api'
        
jest.mock('../util/api')

// Enables testing with react query
const renderWithClient = (children) => {
	const queryClient = new QueryClient({
		defaultOptions: {
			queries: {
				// Turns retries off
				retry: false,
			},
		},
	})

	const { rerender, ...result } = render(<QueryClientProvider client={queryClient}>{children}</QueryClientProvider>)

	return {
		...result,
		rerender: (rerenderUi) =>
			rerender(<QueryClientProvider client={queryClient}>{rerenderUi}</QueryClientProvider>)
	}
}

describe('UserAdmin', () => {
    it('renders page')

    it('returns search results if there are user matches')

    it('returns no search results if there are no matches')

    it('selects user from search results and displays user page')

    it('shows success message after updating widget instance successfully')

    it('shows error message after updating widget instance fails')

    it('should not load page if user is not logged in')
})