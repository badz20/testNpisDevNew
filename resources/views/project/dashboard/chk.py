#!/usr/bin/env python
# coding: utf-8

# In[ ]:





# In[8]:


from arcgis.gis import GIS
from arcgis.mapping import WebMap
gis = GIS("https://rinm8n4id9eojflo.maps.arcgis.com/home/", "riddhihecta", "new2023year")
print(f"Connected to {gis.properties.portalHostname} as {gis.users.me.username}")


# In[9]:


map = gis.map()
map.center = [6.022768988880618, 108.10203525913799]
map.zoom = 9
map.basemap = 'streets'
map


# In[11]:


bound_item = gis.content.get('61d32da0d0ec4aeabe61f0c314e5b1bb')
bound_layer = bound_item.layers[0]
bound_layer


# In[14]:


map.add_layer(bound_layer, options={'opacity':0.4})


# In[ ]:





