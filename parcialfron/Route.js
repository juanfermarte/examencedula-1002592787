import React from 'react';
import { NavigationContainer } from '@react-navigation/native';
import { createBottomTabNavigator } from '@react-navigation/bottom-tabs'; // Corrige el error tipográfico
import Welcome from './Welcome';
import Home from './Home';
import Register from './Register';

const Tab = createBottomTabNavigator(); // Usa el nombre corregido

export default function Route() {
    return (
      <NavigationContainer>
        <Tab.Navigator>
            <Tab.Screen name="Welcome" component={Welcome} />
            <Tab.Screen name="Home" component={Home} />
            <Tab.Screen name="Register" component={Register} />
        </Tab.Navigator>
      </NavigationContainer>
    );
}
