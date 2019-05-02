using System.Collections.Generic;
using System.ServiceModel;

namespace lab3
{
    [ServiceContract]
    public interface IService1
    {
        [OperationContract]
        IEnumerable<Client> GetClients();
        [OperationContract]
        Client GetClient(int id);
        [OperationContract]
        int AddClient(Client client);
        [OperationContract]
        Client EditClient(Client client);
        [OperationContract]
        int DeleteClient(Client client);

        [OperationContract]
        IEnumerable<Service> GetServices();
        [OperationContract]
        Service GetService(int id);
        [OperationContract]
        int AddService(Service service);
        [OperationContract]
        Service EditService(Service service);
        [OperationContract]
        int DeleteService(Service service);

        [OperationContract]
        IEnumerable<Orders> GetOrders();
        [OperationContract]
        Orders GetOrders(int id);
        [OperationContract]
        int AddOrders(Orders order);
        [OperationContract]
        Orders EditOrders(Orders order);
        [OperationContract]
        int DeleteOrders(Orders orderorder);

    }
}
